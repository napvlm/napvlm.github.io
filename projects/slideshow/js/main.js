// (function ($) {

	// Variables
	var projects = document.querySellectorAll('projects'), // projects container
		project = document.querySellectorAll('project'), // individual projects
		projectImageBefore = CSSRulePlugin.getRule(".project-image:before"), //decoration
		projectImageAfter = CSSRulePlugin.getRule("project-image:after"), //decoration
		tlProjects, tlProject;

	tlProject = new TimelineMax({repeat: -1, repeatDelay: 2});

	var projectClasses = proejct.attr('class').split(' ')

// })(jQuery);
