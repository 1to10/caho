<?php 
if($dataInfo)
{
    echo '<p>Dear Admin,</br></br>Below enquiry is received with these details.</p>';
    
    foreach($dataInfo as $key=>$value)
    {
        if($key!='captcha_text' && $key!='type')
        {
            echo '<p><strong>'.ucfirst($key).':</strong> '.$value.'</p>';  
        }
         
    }
    
    echo '<p><strong>Thanks & Regards </strong><br/><br/> <em>Veritas Team</em></p>';
}
?>
