<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="submenu-open">
					<h6 class="submenu-hdr">Main</h6>
					<ul>
						<li class="submenu">
							<a href="<?= ROOT ?>/Homes" class="subdrop active"><i data-feather="grid"></i><span>Dashboard</span><span class="menu-arrow"></span></a>
						</li>
					</ul>
				</li>
				<li class="submenu-open">
					<h6 class="submenu-hdr">Gestion-Quincaillerie</h6>
					<ul>
						<li class="submenu">
							<a href="javascript:void(0);">
								<i data-feather="box"></i><span>Article</span><span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="<?= ROOT ?>/Articles/Liste_article">Liste</a></li>
								<li><a href="<?= ROOT ?>/StockAppros">Inventaire</a></li>
								<li><a href="<?= ROOT ?>/Stocks/Liste_Stock">Stock article</a></li>
							</ul>
						</li>
					</ul>
					<ul>
						<li class="submenu">
							<a href="javascript:void(0);">
								<i data-feather="shopping-bag"></i><span>Espace Commande</span><span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="ui-alerts.html">Ajouter une commande</a></li>
								<li><a href="ui-accordion.html">Liste commande</a></li>
								<li><a href="ui-avatar.html">Paiement</a></li>
							</ul>
						</li>
					</ul>
					<ul>
						<li class="submenu">
							<a href="javascript:void(0);">
								<i data-feather="shopping-cart"></i><span>Espace Vente</span><span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="<?= ROOT ?>/Ventes/Liste_vente">Liste vente Engros</a></li>
								<li><a href="<?= ROOT ?>/Ventes/Liste_vente_detaillants">Liste vente Detaille</a></li>
								<li><a href="ui-avatar.html">facture</a></li>
							</ul>
						</li>
					</ul>
					<ul>
						<li class="submenu">
							<a href="javascript:void(0);">
								<i data-feather="users"></i><span>Fournisseurs & clients</span><span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="<?= ROOT ?>/ClientFournisseurs/Liste_client_fournisseur">Liste</a></li>
							</ul>
						</li>
					</ul>
					<ul>
						<li class="submenu">
							<a href="javascript:void(0);">
								<i data-feather="bar-chart-2"></i><span>Rapport & Analyses</span><span class="menu-arrow"></span>
							</a>
							<ul>
								<li><a href="ui-alerts.html">Journaliere</a></li>
								<li><a href="ui-accordion.html">Mensuelle</a></li>
								<li><a href="ui-avatar.html">Annuelle</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="submenu-open">
					<h6 class="submenu-hdr">Configuration du systeme</h6>
					<ul>
						<li class="submenu">
							<a href="javascript:void(0);">
								<i data-feather="settings"></i><span>Configuration</span><span class="menu-arrow"></span>
							</a>
							<ul>
								<?php if ($_SESSION['role'] == "SuperAdmin"): ?>
									<li><a href="<?= ROOT ?>/Boutiques/ListeBoutique">Boutique </a></li>
								<?php endif ?>
								<li><a href="<?= ROOT ?>/Users/Liste_utilisateur">Utilisateurs</a></li>
								<li><a href="<?= ROOT ?>/AutresConfigs">Autres</a></li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>