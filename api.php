<?php
  include $path.'config.php';
  
  class Api {
    function fetch($type) {
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, API_URL.$type);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "cache-control: no-cache"
      ));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  
      $response = curl_exec($curl);
      $obj = json_decode($response, false);
  
      curl_close($curl);

      return $obj->data;
    }

    function fetchProjects() {
      $projects = $this->fetch('projects');

      foreach($projects as $project){
        $project->tags = implode(", ", $project->tags);
      }

      return $projects;
    }
    
    function fetchResources() {
      $resources = $this->fetch('resources');
      $tags_by_name = (object) [];
      $all_tags = [];

      foreach($resources as $resource){
        $tags = $resource->tags;
        
        foreach($resource->tags as $tag) {
          if (!isset($tags_by_name->{$tag})) {
            $tag_object = (object) [
              'count' => 0,
              'name' => $tag,
            ];

            $tags_by_name->$tag = $tag_object;

            array_push($all_tags, $tag_object);
          }
          $tags_by_name->{$tag}->count = $tags_by_name->{$tag}->count + 1;
        }

        $resource_tags = [];
        
        foreach($tags as $tag) {
          array_push($resource_tags, $tags_by_name->{$tag});
        }
        $resource->tags = $resource_tags;
      }
      $all_tags = (array) $tags_by_name;

      return (object) [
        'resources' => $resources,
        'tags' => $all_tags,
      ];;
    }
  }

  $api = new Api;
?>
