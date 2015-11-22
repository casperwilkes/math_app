#The Math App

##Purpose
This application is a series of calculator programs in a single, easy to use, GUI. 
Adding and removing programs is an easy endeavor. Just copy the **NewProgram.php** file
from the *math_app/app* directory into the *Programs* directory, rename 
the file to the program you want to create, and customize the class using the 
explanations provided in the file. After you've tailored your class, added the name and a 
description to the **math.xml** index file, you're ready to use your new calculator. 

##What Makes this Calculator Unique?
What makes this calculator unique is the fact that it's so easy to extend and use. 
There is no database required to function, and all of the files are stored locally and in 
an easy to remember location. If you want to add a program, you just add one file, and
modify the programs.xml file. If you want to remove a program, you just do the opposite.

##Example Usage
**Add an Addition program to the programs directory:**

- Copy: */webroot/math_app/app/NewProgram.php*
- Paste to: */webroot/math_app/app/programs/addition.php*

```php
<?php

namespace MathApp\Programs;

use MathApp\Classes;

class Addition extends Classes\BaseMath implements Classes\InterfaceMath {

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $this->answer = $nums['num1'] + $nums['num2'];
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'If you have 2 apples, and you are given 2 apples, how many 
            apples do you have?';
    }

    protected function setFields() {
        $this->form_fields = array(
            'num1' => 'First Number',
            'num2' => 'Second Number'
        );
    }

}
?>
```

**Add the new Addition program to the index:**

- The file is located at: */webroot/math_app/app/programs.xml*

```xml
    <function>
        <name>Addition</name>
        <description>
            Adds numbers together.
        </description>
    </function>
```

**Note:** *it does not matter what order you add the programs to the math index file.
They will appear alphabetically after the program starts.*

After you've loaded and edited the files, go to *localhost/math_app/public/* 
locate the new program from the list and click the hyper-link. 