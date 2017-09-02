module.exports = {
	options: {
		banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
			' * <%=pkg.homepage %>\n' +
			' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
			' * Licensed GPL-2.0+' +
			' */\n'
	},
	minify: {
		expand: true,

		cwd: 'assets/css/',
		src: ['louiscasale---twenty-seventeen.css'],

		dest: 'assets/css/',
		ext: '.min.css'
	},
};
