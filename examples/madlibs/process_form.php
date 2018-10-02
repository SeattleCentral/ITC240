<?php
    $pageTitle = "Halloween Mad Libs Story";
    include 'header.php';
?>
    
    <?php
        $adjective_1 = $_GET['adjective_1'];
        $noun_1 = $_GET['noun_1'];
        $noun_2 = $_GET['noun_2'];
        $noun_3 = $_GET['noun_3'];
        $noun_4 = $_GET['noun_4'];
        $noun_5 = $_GET['noun_5'];
        $noun_6 = $_GET['noun_6'];
        $plural_noun_1 = $_GET['plural_noun_1'];
        $plural_noun_2 = $_GET['plural_noun_2'];
        $plural_noun_3 = $_GET['plural_noun_3'];
        $plural_noun_4 = $_GET['plural_noun_4'];
        $plural_noun_5 = $_GET['plural_noun_5'];
        $plural_noun_6 = $_GET['plural_noun_6'];
        $verb_1 = $_GET['verb_1'];
        $verb_2 = $_GET['verb_2'];
        $verb_3 = $_GET['verb_3'];
        $past_tense_verb_1 = $_GET['past_tense_verb_1'];
        $exclamation_1 = $_GET['exclamation_1'];
    ?>
    
    <p>
        Once upon a time, in a <?php echo $adjective_1; ?> land lived a little
        witch named Ebony and her <?php echo $noun_1; ?>. They lived in a spooky
        <?php echo $noun_2; ?> on top of a hill, far from town.
    </p>
    
    <?php
        echo "<p>Every year, the witch family did the same thing on Halloween;
        they jumped on their $plural_noun_1 and flew through town, scaring
        young $plural_noun_2. They circled in the sky, high above the 
        $plural_noun_3. They cackled. They $past_tense_verb_1. They scared anyone
        and anything they saw</p>";
    
    ?>

    
    <p>
        <a href="/">Go Back</a>
    </p>
    
<?php include 'footer.php'; ?>