{% if site.env == 'developement' %}
	<script>
	(function()   {
		var  _p = 'http://squizlabs.github.com/HTML_CodeSniffer/build/';
		var  _i = function(s, cb)   {
				var  sc = document.createElement('script');
				sc.onload   =  function()   {
					sc.onload   =  null;
					sc.onreadystatechange   =  null;
					cb.call(this);
				};
				sc.onreadystatechange   =  function() {
					if (/^(complete|loaded)$/.test(this.readyState)   ===  true) {
						sc.onreadystatechange   =  null;
						sc.onload();
					}
				};
				sc.src = s;
				if  (document.head)   {
					document.head.appendChild(sc);
				}  else   {
					document.getElementsByTagName('head')[0].appendChild(sc);
				}
			};  var  options = {
			path: _p
		};
		_i(_p + 'HTMLCS.js', function() {
			HTMLCSAuditor.run('WCAG2AAA', null, options);
		});
	})();
	</script>
{% endif %}