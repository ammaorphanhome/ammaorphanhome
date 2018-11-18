
<?php

if(isset($_POST) && $_POST['submit']=='Submit') { ?>

    <script type="text/javascript">
        alert('Please try Again ==> <?php echo $interest; ?>');
    </script>

<?php }
?>


<form>
    <fieldset>
        <legend>Choose your interests</legend>
        <div>
            <input type="checkbox" id="coding" name="interest[]" value="coding">
            <label for="coding">Coding</label>
        </div>
        <div>
            <input type="checkbox" id="music" name="interest[]" value="music">
            <label for="music">Music</label>
        </div>
        <div>
            <input type="checkbox" id="art" name="interest[]" value="art">
            <label for="art">Art</label>
        </div>
        <div>
            <input type="checkbox" id="sports" name="interest[]" value="sports">
            <label for="sports">Sports</label>
        </div>
        <div>
            <input type="checkbox" id="cooking" name="interest[]" value="cooking">
            <label for="cooking">Cooking</label>
        </div>
        <div>
            <input type="checkbox" id="other" name="interest[]" value="other">
            <label for="other">Other</label>
            <input type="text" id="otherValue" name="other">
        </div>
        <div>
            <button type="submit" value="Submit">Submit form</button>
            <button type="submit" name="submit" value="Submit"
                    class="btn btn-primary icon-btn">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
            </button>
        </div>
    </fieldset>
</form>

<script>

    var otherCheckbox = document.querySelector('input[value="other"]');
    var otherText = document.querySelector('input[id="otherValue"]');
    otherText.style.visibility = 'hidden';

    otherCheckbox.onchange = function() {
        if(otherCheckbox.checked) {
            otherText.style.visibility = 'visible';
            otherText.value = '';
        } else {
            otherText.style.visibility = 'hidden';
        }
    };

</script>


