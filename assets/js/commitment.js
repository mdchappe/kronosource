/*!

Name: Commitment
Dependencies: jQuery
Author: Michael Lynch
Author URL: http://michaelynch.com
Date Created: February 7, 2014
Last Updated: February 7, 2014
Licensed under the MIT license

*/

;(function($) {

    $.fn.commitment = function(options) {
    
    	//return if no element was bound
		//so chained events can continue
		if(!this.length) { 
			return this; 
		}

		//define default parameters
        var defaults = {
        	user: null,
        	repo: null,
        	filterBranch: null,
        	filterAuthor: null,
        	filterPath: null,
        	filterSince: null,
        	filterUntil: null,
            makeCommitLink: false,
            showCommitDate: true,
            dateFormat: null,
            showCommitter: true,
            showCommitterAvatar: false,
            error: function(message) {},
            success: function() {},
            limit: 1
        }
        
        //define plugin
        var plugin = this;

        //define settings
        plugin.settings = {}
 
        //merge defaults and options
        plugin.settings = $.extend({}, defaults, options);
        
        var s = plugin.settings;

        //define element
        var el = $(this);
        
        //if user and repo are set
        if(s.user && s.repo) {

	        //define endpoint
	        var endPoint = 'https://api.github.com/repos/'+s.user+'/'+s.repo+'/commits';

	        //define params array
	        var params = [];

	        //if filter author is set
	        if(s.filterBranch) {

	    		//push filter author param
	    		params.push('sha='+s.filterBranch);
	        }

	        //if filter author is set
	        if(s.filterAuthor) {

	    		//push filter author param
	    		params.push('author='+s.filterAuthor);
	        }

	        //if filter path is set
	        if(s.filterPath) {

		        //push path param
		        params.push('path='+s.filterPath);
	        }

	        //if filter since is set
	        if(s.filterSince) {

		        //push since param
		        params.push('since='+s.filterSince);
	        }

	        //if filter until is set
	        if(s.filterUntil) {

		        //push until param
		       params.push('until='+s.filterUntil);
	        }

	        //join params using an ampersand
	        //and add a question mark to define the first param
	        params = '?'+params.join('&');

	        //if there are params
	        if(params.length > 1) {

		        //append params to endpoint
		        endPoint += params;
	        }

	        //for each element
	        el.each(function() {

	        	$.ajax({
		        	type: 'GET',
		        	url: endPoint,
		        	dataType: 'json',
		        	success: function(data) {

		        		//default limit
		        		var showLimit = data.length;

	        			//get the show limit
		        		if(s.limit) {
		        			showLimit = s.limit;
		        		}

		        		//for each commit or until limit is reached
		        		for(var i = 0; i < showLimit; i++) {

		        			//define commit as a list item
		        			var commit = '<li>Most Recent Commit: ';

		        			//if makeCommitLink is true and html_url exists
		        			if(s.makeCommitLink && data[i].html_url) {

		        				//wrap commit message with an anchor tag
		        				commit += '<a href="'+data[i].html_url+'" target="_blank" class="message">'+data[i].commit.message+'</a>';

		        			} else {

			        			//otherwise just write out the commit message
			        			commit += '<span class="message">'+data[i].commit.message+'</span>';
		        			}

		        			if(s.showCommitDate && data[i].commit.committer.date) {

		        				var date = new Date(data[i].commit.committer.date);

			        			var day = date.getDate();

								var month = date.getMonth();

								var year = date.getFullYear();

								if(s.dateFormat === 'dd/mm/yyyy') {

									date = day+'/'+month+'/'+year;

								} else {

									date = date.toDateString();

								}

			        			commit += '<span class="date">'+date+'</span>';
		        			}

		        			//if showCommitter is true and committer.login exists
		        			if(s.showCommitter && data[i].committer.login) {

			        			//create committer div
			        			commit += ' <span class="committer">';

			        			//if showCommitterAvatar is true and committer.avatar_url exists 
			        			if(s.showCommitterAvatar && data[i].committer.avatar_url) {

				        			//append committer avatar
				        			commit += '<img src="'+data[i].committer.avatar_url+'" alt="Github Avatar" class="avatar" />';
			        			}

			        			//append committer username
			        			commit += '<span class="user">By <span>'+data[i].committer.login+'</span></span></span>';
		        			}

		        			//close the commit message list item
		        			commit += '</li>';

			        		//append the commit
			        		el.append(commit);
		        		}

		        		//run success callback
		        		s.success.call(this);

		        	},
		        	error: function(jqXHR, textStatus,  errorThrown) {

		        		//run error callback
		        		s.error.call(this, 'Status: '+jqXHR.status+' Error: '+errorThrown);

		        	}

	        	});//ajax

	        });//each
        
        } else {

	        //run error callback
		    s.error.call(this, 'A Github username and repository are required.');

        }

    }

})(jQuery);