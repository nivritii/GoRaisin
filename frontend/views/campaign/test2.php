<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row form-group">
        <div class="col-xs-12" hidden>
            <ul class="nav nav-pills nav-justified thumbnail setup-panel" id="myNav" >
                <li id="navStep1" class="li-nav active" step="#step-1">
                    <a>
                        <h4 class="list-group-item-heading">Step 1</h4>
                        <p class="list-group-item-text">First step description</p>
                    </a>
                </li>
                <li id="navStep2" class="li-nav disabled" step="#step-2">
                    <a>
                        <h4 class="list-group-item-heading">Step 2</h4>
                        <p class="list-group-item-text">Second step description</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<form class="container">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1> STEP 1</h1>
                <!-- <form> -->

                <div class="container col-xs-12">
                    <input />
                </div>
                <input onclick="step1Next()" class="btn btn-md btn-info" value="Next">

                <!-- </form> -->
            </div>
        </div>
    </div>
</form>
<form class="container">
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="text-center"> STEP 2</h1>

                <!--<form>-->
                <div class="container col-xs-12">
                    <input />
                    <input />
                </div>
                <!--</form> -->

                <input onclick="prevStep()" class="btn btn-md btn-info" value="Prev">

            </div>
        </div>
    </div>
</form>


<script>
    var currentStep = 1;

    $(document).ready(function () {

        $('.li-nav').click(function () {

            var $targetStep = $($(this).attr('step'));
            currentStep = parseInt($(this).attr('id').substr(7));

            if (!$(this).hasClass('disabled')) {
                $('.li-nav.active').removeClass('active');
                $(this).addClass('active');
                $('.setup-content').hide();
                $targetStep.show();
            }
        });

        $('#navStep1').click();

    });



    function step1Next() {
        //You can make only one function for next, and inside you can check the current step
        if (true) {//Insert here your validation of the first step
            currentStep += 1;
            $('#navStep' + currentStep).removeClass('disabled');
            $('#navStep' + currentStep).click();
        }
    }

    function prevStep() {
        //Notice that the btn prev not exist in the first step
        currentStep -= 1;
        $('#navStep' + currentStep).click();
    }

</script>