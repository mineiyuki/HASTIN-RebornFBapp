<?php
class Questions extends CI_Controller{
	
	public function index()
	{
		$doc = new DOMDocument();
		$doc->load( 'data/config.xml' );
		
		$questions=$doc->getElementsByTagName("questions")->item(0)->childNodes;
		
		
		$qa=array();
 		for ($i = 0; $i < $questions->length; $i++) {
			$elements=$questions->item($i)->childNodes;
			if($elements){
				$question=new stdClass();
				$question->answers=array();
				
				for ($j = 0; $j < $elements->length; $j++) {
					
					switch ($elements->item($j)->nodeName) {
						case "question":
							//echo "Question : ".$elements->item($j)->nodeValue."<br>";
							$question->question=$elements->item($j)->nodeValue;
							break;
						case "answer":
							//echo "Answer : ".$elements->item($j)->nodeValue."<br>";
							array_push($question->answers, $elements->item($j)->nodeValue);
							break;
						
					}
				}
				array_push($qa, $question);
				//echo "______________________<br><br>";
			}
 		}
		
		$data=array();
		$data['questions']=$qa;
		$this->load->view('questions_view',$data);
	}
}