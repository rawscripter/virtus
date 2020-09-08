<template>
    <main role="main">
        <div class="picContainer">
            <picture>
                <source srcset="../assets/images/bg1Lg.png" media="(min-width: 1400px)">
                <source srcset="../assets/images/bg1Md.png" media="(min-width: 768px)">
                <source srcset="../assets/images/bg1Reg.png" media="(min-width: 576px)">
                <img srcset="../assets/images/bg1sm.png" alt="responsive image" class="d-block img-fluid" style="width: 100%">
            </picture>
            <div class="centered">
                FAIR, FAST, CASH OFFER IN UNDER 10 Minutes!
                <p class="callUs"> CALL US TODAY (919) 275-5388</p>
            </div>
        </div>


        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <img src="../assets/images/offer.png" class="bd-placeholder-img rounded-circle" width="140" height="140" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                    <h2>Get Offer</h2>
                    <p> Our Offer Process is very simple. We ask a series of questions about the condition of the home, details of what you may be looking for and the type of offers available. Upon
                        giving you an offer we then explain the process and if you feels we are a good fit to move forward with the offer then you would move to accept the offer.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="../assets/images/shakehands.png" class="bd-placeholder-img rounded-circle" width="140" height="140" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                    <h2>Accept Offer</h2>
                    <p>Upon acceptance of our offer we move you with a transaction coordinator who will coordinate with you all the things needed to move towards closing. We will execute our inspection, check the title
                        do a visit to the property if necessary, take pictures and finalize closing process. If everything checks out we move forward with a closing date.</p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="../assets/images/signdoc.jpeg" class="bd-placeholder-img rounded-circle" width="140" height="140" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140">
                    <h2>Close Property</h2>
                    <p>Finally, once all the proper inspection, title work and or assigning to a buying partner we then set a time and date for you to meet at the title or closing attorney for closing. We can also setup a remote closing
                        if that is better for you using the proper legal process to sign documentation. This info will be discuss with attorney and or title company</p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Simple Process Selling A Home</h2>
                    <p class="lead">Triangle Cash Homes. LLC buys houses in and around Nation Wide with high focus in the Raleigh, Charlotte (and other areas too!). We’re not listing your house… we’re actually the ones buying your house. Because we pay cash, we’re able to close quickly… or on your schedule. Like we’ve mentioned, when you work with us there are no fees… like there are when you list your house with an agent.
                        What this means to you is you don’t have to worry about extra costs, having to come out of pocket to sell your house fast, or even getting your house ready for a sale (we’ll buy your house as-is).
                        Don’t worry about repairing or cleaning up your property. We’ll buy your house in as-is condition… no matter how ugly or pretty it is… no matter the location.</p>
                </div>
                <div class="col-md-5">
                    <img src="../assets/images/house.jpg"  class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" reserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Ready to take the next steps?</h2>
                    <p class="lead">If you feel that your ready to hear what type of offer we can give you call us <b>(919) 275-5388</b>. One of our acquisition specialist will be ready to make you an offer and guide
                        you through the steps on getting your property close in as little as 7 days or as long as you would like. We can give you multiple offers cash or creative. No matter your situation its worth hearing what
                        we have to offer before you make a decision.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img  src="../assets/images/easyprocess.png"  class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500"  preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
                </div>
            </div>
            <hr class="featurette-divider">
            <!-- /END THE FEATURETTES -->
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Who Are We?</h2>
                    <p class="lead">We are a Veteran Real Estate Investment company that assign, purchase and offer creative solution to selling a home. We have a variety of ways to help home owners selling a property,
                        without the need for a Real Estate Agent or Brokers which in return you will avoid costly repairs, long binding contracts that can keep your home on the markets for months. Best of all we close
                        with a reputable title/attorney base on your state laws and the process can be as fast as you like with the right offer. As veterans we determine that taking care of home owners is our duty
                        and to ensure they get the best possible service there is. I know there are a lot of scams and others who will not look to give you a fair offer, but with us you will always be served in such
                        way that is honest and fair.</p>

                </div>
                <div class="col-md-5">
                    <img src="../assets/images/veteran.jpg"  class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" reserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500">
                </div>
            </div>


        </div>
    </main>
</template>

<script>
export default {
    name: "Home",
    props: {
        backgroundImage: {
            type: String,
            default: 'images/bannerImg.png'
        },
        backgroundColor: {
            type: String,
            default: 'black',
            validator: (value) => {
                let acceptedValues = ['', 'blue', 'azure', 'green', 'orange', 'red', 'purple', 'black']
                return acceptedValues.indexOf(value) !== -1
            }
        },
    },
    computed: {
        sidebarStyle () {
            return {
                'background-repeat': 'no-repeat',
                'background-size': 'contain',
                backgroundImage: `url(${this.backgroundImage})`,

            }
        }
    }
}
</script>

<style scoped>
/* Container holding the image and the text */
.picContainer {
    position: relative;
    text-align: center;
    color: white;
}

/* Bottom left text */
.bottom-left {
    position: absolute;
    bottom: 8px;
    left: 16px;
}

/* Top left text */
.top-left {
    position: absolute;
    top: 8px;
    left: 16px;
}

/* Top right text */
.top-right {
    position: absolute;
    top: 8px;
    right: 16px;
}

/* Bottom right text */
.bottom-right {
    position: absolute;
    bottom: 8px;
    right: 16px;
}

/* Centered text */
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 2em;
    color:#ff4200;
    font-weight: 00;
    transform: translate(-50%, -50%);
}

.callUs{
    color:#ffffff;
    font-weight: bold;
    font-size: .8em;
}
</style>
