<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PublishingHouse $publishingHouse
 */
?>
<header class="content-header">
	<h1>Publishing houses</h1>
	<?php
	   $this->Breadcrumbs->add('Publishing houses', ['controller' => 'publishing_houses', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
	   $this->Breadcrumbs->add('View');
	   $this->Breadcrumbs->templates($breadcrumbsTemplates);
	   echo $this->Breadcrumbs->render(['class' => 'breadcrumb']);
	?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Information</h3>
				</div>
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Name:</dt>
						<dd><?= $publishingHouse->publishing_house_name?></dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
</section>