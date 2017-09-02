module.exports = {
	dist: {
		options: {
			processors: [
				require( 'autoprefixer' )( {
					browsers: 'last 2 versions'
				} )
			]
		},
		files: {
			'assets/css/louiscasale---twenty-seventeen.min.css': [ 'assets/css/louiscasale---twenty-seventeen.min.css' ],
		}
	}
};
