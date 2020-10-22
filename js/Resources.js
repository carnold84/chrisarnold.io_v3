import {apiUrl} from '../config.js';

class Resources {
  constructor() {
    this.elPage = document.querySelector('#resources-page');
    this.elContent = this.elPage.querySelector('#resources-page-content');
    this.elOptions = this.elPage.querySelector('#resources-page-options');
    this.elTags = this.elPage.querySelector('#resources-page-tags');
    this.elLoading = this.elPage.querySelector('.loading');
    
    this.isLoaded = this.elPage.getAttribute('data-loaded') === 'true';

    this.theme = 'theme-2';
    this.resources;
    this.elResourceItems;
  }

  loadData = async () => {
    if (this.isLoaded === false) {
      this.elLoading.classList.add('show');
      const response = await fetch(`${apiUrl}/resources`);
      this.resources = await response.json();
      this.resources = this.resources.data;
      console.log(this.resources)

      const template = document.querySelector('#resource-item-template');
      const md = window.markdownit();

      this.resources.forEach((resource, i) => {
        const elResourceItem = template.content.cloneNode(true);
        
        this.setElementText(elResourceItem, '.resource-item-title', resource.name);
        this.setElementText(elResourceItem, '.resource-item-url-link', resource.link);

        let tags = resource.tags.map(element => {
          return toTitleCase(element);
        });
        tags = tags.join(', ');
        this.setElementText(elResourceItem, '.resource-item-tags', tags);

        this.elContent.appendChild(elResourceItem);
      });

      this.elLoading.classList.remove('show');
    }

    this.elResourceItems = this.elContent.querySelectorAll('.resource-item');

    console.log(this.elResourceItems)
  };

  setElementText = (element, selector, value) => {
    const node = element.querySelector(selector);
    node.innerHTML = value;
  };

  hide = () => {
    this.elPage.classList.remove('show');
  };

  show = () => {
    this.elPage.classList.add('show');
    this.loadData();
  };
}

export default new Resources();