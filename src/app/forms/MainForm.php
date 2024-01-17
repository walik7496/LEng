<?php
namespace app\forms;

use std, gui, framework, app;


class MainForm extends AbstractForm
{
    
    /**
     * @event show 
     */
    function doShow(UXWindowEvent $e = null)
    {
        $GLOBALS['i'] = file('data.txt')[0];
        $GLOBALS['g'] = file('data.txt')[1];
        $GLOBALS['w'] = file('data.txt')[2];
        $this->label->text = file('rus.txt')[$GLOBALS['i']];
        $this->title = "Learn English | " . $GLOBALS['i'] . "/" . count(file('rus.txt'));
    }


    /**
     * @event close 
     */
    function doClose(UXWindowEvent $e = null)
    {   
        $f = fopen('data.txt', 'w+');
        fwrite($f, $GLOBALS['i'] . "\n");
        fwrite($f, $GLOBALS['g'] . "\n");
        fwrite($f, $GLOBALS['w']);
        fclose($f);
    }    

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {
        if ($this->edit->text == trim(file('eng.txt')[$GLOBALS['i']])) {
            $GLOBALS['g']++;
        } else {
            $GLOBALS['w']++;
            Dialog::error('You wrote something wrong!');
        }
        $this->edit->text = '';
        if ($GLOBALS['i'] == 7999) {
            alert("You Win!");
            if (Dialog::confirm('Do you clear your results?')) {
                $GLOBALS['i'] = 0;
                $GLOBALS['g'] = 0;
                $GLOBALS['w'] = 0;
                $f = fopen('data.txt', 'w+');
                fwrite($f, $GLOBALS['i'] . "\n");
                fwrite($f, $GLOBALS['g'] . "\n");
                fwrite($f, $GLOBALS['w']);
                fclose($f);
                exit();
            } else {
                $GLOBALS['i'] = -1;
                $GLOBALS['g'] = 0;
                $GLOBALS['w'] = 0;
            }
        }
        $GLOBALS['i']++;
        $this->label->text = file('rus.txt')[$GLOBALS['i']];
        $this->title = "Learn English | " . $GLOBALS['i'] . "/" . count(file('rus.txt'));
    }

    /**
     * @event button8.action 
     */
    function doButton8Action(UXEvent $e = null)
    {  
        alert(trim(file('eng.txt')[$GLOBALS['i']]));
    }

    /**
     * @event button9.action 
     */
    function doButton9Action(UXEvent $e = null)
    {    
        $GLOBALS['i'] = 0;
        $GLOBALS['g'] = 0;
        $GLOBALS['w'] = 0;
        $f = fopen('data.txt', 'w+');
        fwrite($f, $GLOBALS['i'] . "\n");
        fwrite($f, $GLOBALS['g'] . "\n");
        fwrite($f, $GLOBALS['w']);
        fclose($f);
        $this->label->text = file('rus.txt')[$GLOBALS['i']];
        $this->title = "Learn English | " . $GLOBALS['i'] . "/" . count(file('rus.txt'));
        $this->edit->text = '';
    }

    /**
     * @event button10.action 
     */
    function doButton10Action(UXEvent $e = null)
    {    
        alert('Good: ' . $GLOBALS['g'] . "\n" . 'Wrong: ' . $GLOBALS['w']); 
    }


}
