class Home {
  constructor() {
    this.elPage = document.querySelector('#home-page');
    this.theme = 'theme-1';
  }

  hide = () => {
    this.elPage.classList.remove('show');
  };

  show = () => {
    this.elPage.classList.add('show');
  };
};

export default new Home();