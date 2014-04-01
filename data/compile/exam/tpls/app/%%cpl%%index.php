<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('head'); ?>
<body>
<!--导航-->
<?php $this->_compileInclude('nav'); ?>
<div id="main">
	<!--主体右侧 -->
	<div id="right_970" class="right_970">
    	<div class="bor_top"></div>
    	<div class="bor_mid">
            <div class="container-fluid" id="datacontent">
<?php } ?>
				<div class="row-fluid">
					<div class="span12">
			            <ul class="thumbnails">
							<li class="span3">
								<div class="thumbnail">
									<img alt="300x200" src="app/exam/styles/image/paper.png" style="width:160px;"/>
									<div class="caption">
										<p class="text-center">
											<a class="btn btn-warning" href="index.php?exam-app-basics-open" title="开通新考场">开通新考场</a>
										</p>
									</div>
								</div>
							</li>
						</ul>
						<div id="notice">
			            	<h2 class="page_title"><img src="app/exam/styles/image/exam_opened_basic.jpg" alt="我的考场" /></h2>
			            </div>
			            <ul class="thumbnails">
							<?php $bid = 0;
 foreach($this->tpl_var['basics'] as $key => $basic){ 
 $bid++; ?>
							<li class="span3">
								<div class="thumbnail">
									<img alt="300x200" src="<?php if($basic['basicthumb']){ ?><?php echo $basic['basicthumb']; ?><?php } else { ?>app/exam/styles/image/paper.png<?php } ?>" style="width:160px;"/>
									<div class="caption">
										<p class="text-center">
											<a class="ajax btn btn-primary" href="index.php?<?php echo $this->tpl_var['_app']; ?>-app-index-setCurrentBasic&basicid=<?php echo $basic['basicid']; ?>" title="<?php echo $basic['basic']; ?>"><?php echo $this->G->make('strings')->subString($basic['basic'],28); ?></a>
										</p>
									</div>
								</div>
							</li>
							<?php if($bid % 4 == 0){ ?>
							</ul>
							<ul class="thumbnails">
							<?php } ?>
							<?php } ?>
						</ul>
					</div>
				</div>
<?php if(!$this->tpl_var['userhash']){ ?>
			</div>
    	</div>
    	<div class="bor_bottom"></div>
    </div>
	<!--主体右侧 结束-->
	<!--尾部-->
	<?php $this->_compileInclude('foot'); ?>
    <!--尾部 结束-->
</div>
</body>
</html>
<?php } ?>