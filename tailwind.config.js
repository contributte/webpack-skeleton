module.exports = {
	content: [
		'./app/**/*.{js,jsx,ts,tsx,vue,latte}',
	],
	theme: {
		extend: {},
	},
	variants: {
		extend: {},
	},
	plugins: [
		require('@tailwindcss/forms'),
	],
};
