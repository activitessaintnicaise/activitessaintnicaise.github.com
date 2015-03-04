module.exports = function(grunt) {
  "use strict";
  require('time-grunt')(grunt);
  require('jit-grunt')(grunt);

  // Project configuration.
  grunt.initConfig({
    yslow: {
      options: {
        thresholds: {
          weight: 180,
          speed: 3000,
          score: 80,
          requests: 15
        }
      },
      pages: {
        files: [
          {
            src: 'http://activitesaintnicaise.org',
         }
        ]
      }
    },
    accessibility: {
      options : {
        accessibilityLevel: 'WCAG2A'
      },
      test : {
        src: ['localhost:4000']
      }
    },
    imageoptim: {
      myTask: {
        src: ['images','assets/img']
      }
    },
    phantomas: {
      gruntSite : {
        options : {
          indexPath : './phantomas/',
          options   : {},
          url       : 'http://activitesaintnicaise.org/'
        }
      }
    },
    jekyll: {
      server : {
        src : 'templates',
        dest: 'dev',
        server : true,
        server_port : 8000,
        auto : true
      },
      dev: {
        src: 'templates',
        dest: 'dev'
      },
      prod: {
        src: 'templates',
        dest: 'prod'
      }
    },

    watch: { // for development run 'grunt watch'
      jekyll: {
        files: ['*.html'],
        tasks: ['jekyll:dev']
      }
    }
  });

  // Load the plugin that provides the tasks.
  grunt.loadNpmTasks('grunt-yslow');
  grunt.loadNpmTasks('grunt-uncss');
  grunt.loadNpmTasks('grunt-imageoptim');
  grunt.loadNpmTasks('grunt-phantomas');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-jekyll');
  grunt.loadNpmTasks('grunt-accessibility');

  // Default task(s).
  grunt.registerTask('default', ['yslow','imageoptim','phantomas','watch']);

};
