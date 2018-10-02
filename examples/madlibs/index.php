
<?php
    $pageTitle = "Halloween Mad Libs Form";
    include 'header.php';
?>

<form method="get" action="process_form.php">
    <p>
        <label>
            Adjective
        </label>
        <input type="text" name="adjective_1">
    </p>
    <p>
        <label>
            Noun
        </label>
        <input type="text" name="noun_1">
    </p>
    <p>
        <label>
            Noun
        </label>
        <input type="text" name="noun_2">
    </p>
    <p>
        <label>
            Noun
        </label>
        <input type="text" name="noun_3">
    </p>
    <p>
        <label>
            Noun
        </label>
        <input type="text" name="noun_4">
    </p>
    <p>
        <label>
            Noun
        </label>
        <input type="text" name="noun_5">
    </p>
    <p>
        <label>
            Noun
        </label>
        <input type="text" name="noun_6">
    </p>
    
    <p>
        <label>
            Plural Noun
        </label>
        <input type="text" name="plural_noun_1">
    </p>
    <p>
        <label>
            Plural Noun
        </label>
        <input type="text" name="plural_noun_2">
    </p>
    <p>
        <label>
            Plural Noun
        </label>
        <input type="text" name="plural_noun_3">
    </p>
    <p>
        <label>
            Plural Noun
        </label>
        <input type="text" name="plural_noun_4">
    </p>
    <p>
        <label>
            Plural Noun
        </label>
        <input type="text" name="plural_noun_5">
    </p>
    <p>
        <label>
            Plural Noun
        </label>
        <input type="text" name="plural_noun_6">
    </p>
    
    <p>
        <label>
            Verb
        </label>
        <input type="text" name="verb_1">
    </p>
    <p>
        <label>
            Verb
        </label>
        <input type="text" name="verb_2">
    </p>
    <p>
        <label>
            Verb
        </label>
        <input type="text" name="verb_3">
    </p>
    
    <p>
        <label>
            Past Tense Verb
        </label>
        <input type="text" name="past_tense_verb_1">
    </p>
    
    <p>
        <label>
            Exclamation
        </label>
        <input type="text" name="exclamation_1">
    </p>

    <button type="submit">Process</button>
</form>

<?php include 'footer.php'; ?>