import Home from './Home.js';
import Code from './Code.js';
import Resources from './Resources.js';
import {baseUrl} from '../config.js';

class Main {
  constructor() {
    this.currentRoute;
    this.elBody;
    this.elMainHeader;
    this.previousRoute;
    this.routesById = {
      code: {
        elLink: undefined,
        path: 'code',
        view: Code
      },
      home: {
        elLink: undefined,
        path: '',
        view: Home
      },
      resources: {
        elLink: undefined,
        path: 'resources',
        view: Resources
      }
    };
  }
  
  init = () => {
    this.elBody = document.querySelector('body');
    this.elMainHeader = document.querySelector('#main-header');

    this.initRoutes(); 
  };

  initRoutes = () => {
    window.addEventListener('popstate', this.onRouteChange);

    const links = this.elMainHeader.querySelectorAll('[data-route]');
    links.forEach(element => {
      const path = element.getAttribute('data-route');
      element.addEventListener('click', this.onMainNavClick);

      console.log(path)

      // store element against route name
      this.routesById[path].elLink = element;
    });

    let nextPath = window.location.href;
    nextPath = nextPath.replace(baseUrl, '');
    nextPath = nextPath.replace(new RegExp('/', 'g'), '');
    // if it's an empty string then it's home!
    nextPath = nextPath;

    const nextRoute = {
      name: nextPath || 'home',
      path: nextPath,
    };

    console.log(nextRoute)
    
    this.updateRoute(nextRoute);
  };

  onRouteChange = evt => {
    evt.preventDefault();

    console.log(evt)

    const nextPath = evt.state ? evt.state.name : 'home';
    const nextRoute = {
      name: nextPath,
      path: nextPath === 'home' ? '' : nextPath,
    };
    
    this.updateRoute(nextRoute);
  };

  onMainNavClick = (evt) => {
    evt.preventDefault();

    const nextPath = evt.currentTarget.getAttribute('data-route');
    const nextRoute = {
      name: nextPath,
      path: nextPath === 'home' ? '' : nextPath,
    };
    this.updateRoute(nextRoute);

    history.pushState({name: nextRoute.name}, 'test', `${baseUrl}/${this.currentRoute.path}`);
  };

  updateRoute = nextRoute => {
    console.log(this.currentRoute, nextRoute)
    this.previousRoute = this.currentRoute;
    this.currentRoute = nextRoute;

    if (this.previousRoute) {
      const previousRoute = this.routesById[this.previousRoute.name];
      previousRoute.elLink.classList.remove('is-active');

      const previousView = previousRoute.view;
      previousView.hide();
      this.elBody.classList.remove(previousView.theme);
    }
    
    if (this.currentRoute) {
      const currentRoute = this.routesById[this.currentRoute.name];
      currentRoute.elLink.classList.add('is-active');

      const currentView = currentRoute.view;
      this.elBody.classList.add(currentView.theme);
      currentView.show();
    }
  };
}

const main = new Main();

window.addEventListener('load', main.init);