<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<header class="content-header">
	<h1>Locations</h1>
	<?php
	   $this->Breadcrumbs->add('Locations', ['controller' => 'locations', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
	   $this->Breadcrumbs->add('View');
	   $this->Breadcrumbs->setTemplates($breadcrumbsTemplates);
	   echo $this->Breadcrumbs->render(['class' => 'breadcrumb']);
	?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Location information</h3>
				</div>
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Location:</dt>
						<dd><?= $location->location_name?></dd>
						<dt>Code:</dt>
						<dd><?= $location->location_code?></dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
</section>