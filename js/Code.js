import {apiUrl} from '../config.js';

class Code {
  constructor() {
    this.elPage = document.querySelector('#code-page');
    this.elLoading = this.elPage.querySelector('.loading');
    this.isLoaded = this.elPage.getAttribute('data-loaded') === 'true';

    this.theme = 'theme-2';
    this.projects;
  }

  loadData = async () => {
    if (this.isLoaded === false) {
      this.elLoading.classList.add('show');
      
      const response = await fetch(`${apiUrl}/projects`);
      this.projects = await response.json();
      this.projects = this.projects.data;

      const template = document.querySelector('#code-item-template');
      const md = window.markdownit();

      this.projects.forEach((project, i) => {
        const elCodeItem = template.content.cloneNode(true);

        const paddedNumber = i < 10 ? `0${i + 1}.` : `${i + 1}.`;
        
        this.setElementText(elCodeItem, '.code-item-number', paddedNumber);
        this.setElementText(elCodeItem, '.code-item-header', project.name);

        const description = md.render(project.description);
        this.setElementText(elCodeItem, '.code-item-content', description);

        let tags = project.tags.map(element => {
          return toTitleCase(element);
        });
        tags = tags.join(', ');
        this.setElementText(elCodeItem, '.code-item-tags', tags);

        elCodeItem.querySelector('.repo').href = project.repo_url;
        elCodeItem.querySelector('.demo').href = project.demo_url;

        this.elPage.appendChild(elCodeItem);
      });

      this.isLoaded = true;
      this.elLoading.classList.remove('show');
    }
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

export default new Code();