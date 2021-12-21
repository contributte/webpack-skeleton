import './shared';
import './modules/front';

// Webpack HMR
if (module.hot) {
	module.hot.accept();
  }
