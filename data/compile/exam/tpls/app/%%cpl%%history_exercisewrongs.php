<?php $this->_compileInclude('head'); ?>
<body>
<!--导航-->
<?php $this->_compileInclude('nav'); ?>
<div id="main">
	<!--主体左侧-->
	<?php $this->_compileInclude('left'); ?>
	<!--主体左侧 结束-->
	<!--主体右侧 -->
	<div id="right_760" class="right_760">
    	<?php $this->_compileInclude('bread'); ?>
    	<div class="bor_top"></div>
    	<div class="bor_mid">
    		<div id="hide_left"><a href="javascript:pr()"></a></div>
            <div id="exam_paper">
            <form action="?exam-app-exampaper-score" id="form1" name="form1" method="post">
            	<h2 class="page_title">
                	<img src="app/exam/styles/image/exam_tit.jpg" alt="考试须知" />
                </h2>
       	    	<h1><?php echo $this->tpl_var['sessionvars']['examsession']; ?></h1>
                <h5>总分：<span class="orange">100</span>分 合格分数线：<span class="orange"><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['passscore']; ?></span>分 考试时间：<span class="orange"><?php echo $this->tpl_var['sessionvars']['examsessiontime']; ?></span>分钟 来源：东奥会计在线</h5>
                <?php $oid = 0; ?>
                <?php $qid = 0;
 foreach($this->tpl_var['questype'] as $key => $quest){ 
 $qid++; ?>
                <?php $wrongnumber = 0; ?>
                <?php if($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest['questid']] || $this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest['questid']]){ ?>
                <?php $oid++; ?>
                <h4 class="qu_type"><?php echo $this->tpl_var['ols'][$oid]; ?>、<?php echo $quest['questype']; ?></h4>
                <?php $tid = 0; ?>
                <?php $qnid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest['questid']] as $key => $question){ 
 $qnid++; ?>
                <?php $tid++; ?>
                <?php if($this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] != 1){ ?>
                <?php $wrongnumber++; ?>
                <div class="qu_content" onmouseover="this.className='qu_content_hover'" onmouseout="this.className='qu_content'">
                	<h3><?php echo $tid; ?>、<?php echo html_entity_decode($question['question']); ?></h3>
                    <ul>
                    	<?php echo html_entity_decode($this->ev->stripSlashes($question['questionselect'])); ?>
                    </ul>
                    <span class="examquestionform" name="formquestion_<?php echo $question['questionid']; ?>" id="formquestion_<?php echo $question['questionid']; ?>" rel="nodo">
                    <div class="qu_option" onmouseover="this.className='qu_option_hover'" onmouseout="this.className='qu_option'">
                        <div class="float_r ml_10<?php if($this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']] == 1){ ?> answer_icon_r<?php } else { ?> answer_icon_w<?php } ?>"></div>
                        <?php if($quest['questsort']){ ?>
                        <span class="font_12 float_r cz">【<a href="javascript:favorquestion('<?php echo $question['questionid']; ?>');">收藏</a>】</span>
                        <span class="font_12 float_r cz">【<a href="javascript:question_error('<?php echo $question['questionid']; ?>');">错题举报</a>】</span>
                        <p class=" float_l">本题答案：</p>
                        <div class="clear"></div>
                        <?php } else { ?>
                        <span class="font_12 float_r cz">【<a href="javascript:favorquestion('<?php echo $question['questionid']; ?>');">收藏</a>】</span>
                        <span class="font_12 float_r cz">【<a href="javascript:question_error('<?php echo $question['questionid']; ?>');">错题举报</a>】</span>
						<div class="option_single" id="radio">
                        	<p class=" float_l">本题得分：<?php echo $this->tpl_var['sessionvars']['examsessionscorelist'][$question['questionid']]; ?></p>
                        </div>
                        <div class="clear"></div>
                        <?php } ?>
                    </div>
                    <div class="answer">
                    	<ul>
                        	<li class="red">【正确答案】<?php echo html_entity_decode($this->ev->stripSlashes($question['questionanswer'])); ?></li>
                        	<li><span class="blue">【您的答案】</span><?php if(is_array($this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']])){ ?><?php echo implode('',$this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']]); ?><?php } else { ?><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']])); ?><?php } ?></li>
                        	<li>【所在章】<?php $kid = 0;
 foreach($question['questionknowsid'] as $key => $knowsid){ 
 $kid++; ?>&nbsp;&nbsp;<?php echo $this->tpl_var['globalsections'][$this->tpl_var['globalknows'][$knowsid['knowsid']]['knowssectionid']]['section']; ?>&nbsp;<?php } ?></li>
                        	<li>【知识点】<?php $kid = 0;
 foreach($question['questionknowsid'] as $key => $knowsid){ 
 $kid++; ?>&nbsp;&nbsp;<?php echo $this->tpl_var['globalknows'][$knowsid['knowsid']]['knows']; ?>&nbsp;<?php } ?></li>
                        	<li>【答案解析】</li>
                        	<li class="ml_10"><?php echo html_entity_decode($this->ev->stripSlashes($question['questiondescribe'])); ?></li>
                        </ul>
                    </div>
                    </span>
                </div>
                <?php } ?>
                <?php } ?>
                <?php $qrid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest['questid']] as $key => $questionrow){ 
 $qrid++; ?>
                <?php $tid++; ?>
                <div class="qu_content" onmouseover="this.className='qu_content_hover'" onmouseout="this.className='qu_content'">
                	<h3><?php echo $tid; ?>、<?php echo html_entity_decode($questionrow['qrquestion']); ?></h3>
                	<?php $did = 0;
 foreach($questionrow['data'] as $key => $data){ 
 $did++; ?>
                	<?php if($this->tpl_var['sessionvars']['examsessionscorelist'][$data['questionid']] != $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest['questid']]['score']){ ?>
                	<?php $wrongnumber++; ?>
                	<h3>(<?php echo $did; ?>)<?php echo html_entity_decode($data['question']); ?></h3>
                    <ul>
                    	<?php echo html_entity_decode($this->ev->stripSlashes($data['questionselect'])); ?>
                    </ul>
                    <span class="examquestionform" name="formquestion_<?php echo $data['questionid']; ?>" id="formquestion_<?php echo $data['questionid']; ?>" rel="nodo">
                    <div class="qu_option" onmouseover="this.className='qu_option_hover'" onmouseout="this.className='qu_option'">
    					<div class="float_r ml_10<?php if($this->tpl_var['sessionvars']['examsessionscorelist'][$data['questionid']] == 1){ ?> answer_icon_r<?php } else { ?> answer_icon_w<?php } ?>"></div>
                        <?php if($quest['questsort']){ ?>
                        <span class="font_12 float_r cz">【<a href="javascript:favorquestion('<?php echo $data['questionid']; ?>');">收藏</a>】</span>
                        <span class="font_12 float_r cz">【<a href="javascript:question_error('<?php echo $data['questionid']; ?>');">错题举报</a>】</span>
                        <p class=" float_l">本题得分：<?php echo $this->tpl_var['sessionvars']['examsessionscorelist'][$data['questionid']]; ?></p>
                        <div class="clear"></div>
                        <?php } else { ?>
                        <span class="font_12 float_r cz">【<a href="javascript:favorquestion('<?php echo $data['questionid']; ?>');">收藏</a>】</span>
                        <span class="font_12 float_r cz">【<a href="javascript:question_error('<?php echo $data['questionid']; ?>');">错题举报</a>】</span>
						<div class="option_single" id="radio">
                        	<p class=" float_l">本题答案：</p>
                        </div>
                        <div class="clear"></div>
                        <?php } ?>
                    </div>
                    <div class="answer">
                    	<ul>
                        	<li class="red">【正确答案】</li>
                            <li class="ml_10 mb_10"><?php echo html_entity_decode($this->ev->stripSlashes($data['questionanswer'])); ?></li>
                        	<li class="blue">【您的答案】</li>
                            <li class="ml_10 mb_10"><?php if(is_array($this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']])){ ?><?php echo implode('',$this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']]); ?><?php } else { ?><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']])); ?><?php } ?></li>
                        	<li>【所在章】<?php $kid = 0;
 foreach($questionrow['qrknowsid'] as $key => $knowsid){ 
 $kid++; ?>&nbsp;&nbsp;<?php echo $this->tpl_var['globalsections'][$this->tpl_var['globalknows'][$knowsid['knowsid']]['knowssectionid']]['section']; ?>&nbsp;<?php } ?></li>
                        	<li>【知识点】<?php $kid = 0;
 foreach($questionrow['qrknowsid'] as $key => $knowsid){ 
 $kid++; ?>&nbsp;&nbsp;<?php echo $this->tpl_var['globalknows'][$knowsid['knowsid']]['knows']; ?>&nbsp;<?php } ?></li>
                        	<li>【答案解析】</li>
                        	<li class="ml_10"><?php echo html_entity_decode($this->ev->stripSlashes($data['questiondescribe'])); ?></li>
                        </ul>
                    </div>
                    </span>
                    <?php } ?>
                    <?php } ?>
                </div>
                <?php } ?>
                <?php if(!$wrongnumber){ ?>
                <div>没有错题</div>
                <?php } ?>
                <?php } ?>
                <?php } ?>
            </form>
          	</div>
    	</div>
    	<div class="bor_bottom"></div>
    </div>
	<!--主体右侧 结束-->
	<!--尾部-->
    <?php $this->_compileInclude('foot'); ?>
	<!--尾部 结束-->
    <!--返回顶部-->
    <div id="roll">
      <div id="roll_top"></div>
    </div>
    <!--返回顶部 结束-->
</div>
<script type="text/javascript">
$(document).ready(function(){
		$('#roll').hide();
		$(window).scroll(function() {
			if($(window).scrollTop() >= 100){
				$('#roll').fadeIn(400);
		    }
		    else
		    {
		    $('#roll').fadeOut(200);
		    }
		 });
		 $('#roll_top').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);});
	});
</script>
</body>
</html>