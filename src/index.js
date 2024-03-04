// External dependencies.
import { createRoot } from 'react-dom';

// WordPress dependencies.
import domReady from '@wordpress/dom-ready';

const App = () => {
	return (
		<p>Hello from JavaScript</p>
	)
}

domReady(function () {
	const container = document.getElementById('wpgb-settings');
	const root = createRoot(container);
	root.render(<App />);
});
