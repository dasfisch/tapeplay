				<div class="clear"></div>
				</div> <!-- END CONTENT WRAPPER -->
			</div> <!-- END CONTENT -->
			
			<div id="footer">
				<div id="footer-wrapper">
					
					<ul id="footer-navigation">
						<li>
							<dl>
								<dt>The Basics</dt>
								<dd><a href="{#baseUrl#}company/getstarted/" title="Get Started">Get Started</a></dd>
								<dd><a href="{#baseUrl#}company/guidelines/" title="The Rules of Video">The Rules of Video</a></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>Business Info</dt>
								<dd><a href="{#baseUrl#}company/advertising/" title="Advertising">Advertising</a></dd>
								<dd><a href="{#baseUrl#}company/contact/" title="Contact Us">Contact Us</a></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>For The Curious</dt>
								<dd><a href="{#baseUrl#}company/faq/" title="Frequently Asked Questions">Frequently Asked Questions</a></dd>
								<dd><a href="{#baseUrl#}company/about/" title="About TapePlay">About TapePlay</a></dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>Cool Stuff</dt>
								<dd><a href="{#blogUrl#}" target="_blank" title="Blog">Blog</a></dd>
								<dd><a href="{#shopUrl#}" target="_blank" title="Merchandise" class="analytics" id="merchandise">Merchandise</a></dd>
							</dl>
						</li>
					</ul>
					<div class="clear"></div>
					<div id="footer-terms">
						<ul>
							<li><a href="{#baseUrl#}company/tos/" title="Terms of Service">Terms of Service</a> | <a href="{#baseUrl#}company/privacy/" title="Privacy Policy">Privacy Policy</a></li>
							<li>&copy; {'Y'|date} TapePlay, LLC. All Rights Reserved </li>
						</ul>
					</div>
					
				</div> <!-- END FOOTER WRAPPER -->
			</div> <!-- END FOOTER -->
			
		</div> <!-- END CONTAINER -->
        <script type="text/javascript">
            var sport = "{$sport.name|strtolower}";

            sport = sport.replace(/([^a-zA-Z]+)/g, '');
            console.log(sport + " is the sport")

            $("#container").addClass(sport);
        </script>
	</body>
</html>