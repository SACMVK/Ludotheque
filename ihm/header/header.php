
<div>
	<!-- CHarlette -->
	<nav class="navbar navbar-inverse navigation-clean-button">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand navbar-link" href="#">Ludothèque </a>
				<button class="navbar-toggle collapsed" data-toggle="collapse"
					data-target="#navcol-1">
					<span class="sr-only">Toggle navigation</span><span
						class="icon-bar"></span><span class="icon-bar"></span><span
						class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navcol-1">
				<ul class="nav navbar-nav">

					<li  id="rechercher" role="presentation"><a
						href="index.php?article_a_afficher=Rechercher un jeu">Rechercher
							un jeu</a></li>
				</ul>
				<p class="navbar-text navbar-right actions">
					<a class="navbar-link login" href="index.php?article_a_afficher"=Seconnecter"">Se
						connecter</a> <a class="btn btn-default action-button"
						role="button" href="index.php?article_a_afficher= S'inscrire">S'inscrire
					</a>
				</p>
			</div>




			<!--AhMaD
navbar-default  : pour les couleurs blanche
navbar-inverse : pour inverser les couleurs
navbar-fixed-top : pour fixer la bar toujours malgré le mouvement de page
navbar-right :    pour bouger la bar a droite
** très important:dans firefox ou google chrome en tappant sur insert element ensuit on choisira l'elemet qui nous intéresse et on vas chercher son cass nom pour le modifer dans notre propre css.

  -->
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<!-- data-toggl : pour donner ID comme action il vas chercher cette id et il vs l'exécuter   -->
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#our-navbar"
						aria-expanded="true">
						<!-- cela pour afficher la petite menu dans la mobile display -->
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>

				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="our-navbar">
					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Best Toys of the Month <span class="caret"></span></a>
							<!-- pemière liste des elements -->
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">One more separated link</a></li>
							</ul></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Best Sellers<span class="caret"></span></a>
							<!-- deuxième liste des elements -->
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">help<span class="caret"></span></a> <!-- troisème liste des elements -->
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Option <span class="caret"></span></a> <!-- quaterième liste des elements -->
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul></li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
		</div>
	</nav>
</div>
