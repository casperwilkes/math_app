#The Math App

##Purpose
This application is a series of calculator programs in a single, easy to use, GUI. 
Adding and removing programs is an easy endeavor. Simply create a class 
with a **_Math** suffix, and extend it to use the **Base_Math** class. After 
you've tailored your class, added the name and a description to the **math.xml** 
index file, you're ready to use your new calculator. 

##What Makes this Calculator Unique?
What makes this calculator unique is the fact that it's so easy to extend and use. 
There is no database required to use, and all of the files are stored locally and in 
an easy place to remember. If you want to add a program, you just add one file, and
modify the math index file. If you want to remove a program, you just do the opposite.

##Example Usage
Adding an Addition program:

- create: */webroot/math_app/app/class/programs/addition.php*

```php
<?php

class Addition_Math extends Base_Math {

    public function calculate($nums) {
        $this->answer = $nums['num1'] + $nums['num2'];
    }

    protected function set_example() {
        $this->example = 'If you have 2 apples, and you are given 2 apples, how many 
            apples do you have?';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'num1' => 'First Number',
            'num2' => 'Second Number'
        );
    }
}
?>
```

Adding the new Addition program to the index:

- The file is located at: */webroot/math_app/app/includes/math.xml*

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

After you've loaded and edited the files, go to *localhost/math_app/public/index.php* 
locate the new program from the list and click the hyper-link. 