<?php 

class QuestionViewModel extends ViewModel
{
	public $viewFields = array(
			'question' => array('id','appid','type','title','intro','answer','_type'=>'RIGHT'),
			'question_answer'=>array('answeridentify','answercontent','_on'=>'question.id=question_answer.questionid'),
	);
}
 ?>