


CSS CODE:

================================================================================
@media only screen and (max-width: 600px) {
    .image-side {
        display: none !important;
    }
    .content-heading {
        font-size: 20px !important;
    }
    .count-text {
        font-size: 16px !important;
    }
    .content-step-count {
        width: 50% !important;
    }
    .content-steps {
        overflow: auto;
        display:flex;
        gap:10px;
    }
    .content-steps-content {
        min-width: 276px;
    }
    .mobile-text {
        display:block !important;
        font-size: 12px !important;
        font-weight: 400;
        margin-top: 20px;
    }
    .read-more {
        display:block flex !important;
        min-width: 100%;
        background-image: linear-gradient(268.1deg, #fbf6f9 7.47%, #b7b7b7 98.92%);
        gap: 10px;
        align-items: center;
        justify-content: center;
        border-radius: 40px;
    }
    .read-more-text {
        color: #CC035C;
        font-size: 16px;
        text-decoration-line:underline;
    }
}
.step-home {
    gap: 10px;
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    margin-top: 100px;
}
.image-side {
    background: url(https://jn-img.enclaves.ph/Bagisto/Step%20by%20Step/image%2034.png?updatedAt=1707976008533) no-repeat center;
    background-size: 460px;
    background-position: 80% 0%;
    width: 100%;
    height: 530px;
    display: flex;
    justify-content:center;
    padding-top: 45px;
}
.step-image {
    height: 70%;
}
.content-side {
    margin-top: 60px;
}
.content-steps {
    list-style-type: none;
    margin-top: 30px;
}
.content-steps-content {
    display:flex;
    margin-bottom: 50px;
    font-size: 18px;
    font-weight: 500;
}
.content-step-count {
    background-color: #CC035C;
    color: white;
    height: 50px !IMPORTANT;
    border-radius: 50%;
    font-weight: 700;
    margin-right: 10px;
    align-items: center;
    display: flex;
    justify-content: center;
    min-width: 50px !IMPORTANT;
    max-width: 50px;
}
.count-text {
    font-size: 25px;
}
.content-heading {
    font-size: 40px;
    font-weight: 700;
}
=============================================================================


HTML CODE: 

========================================================================
<div class="container grid grid-cols-2 max-lg:grid-cols-1 py-[20px] max-lg:px-[32px]">
    <div class="image-side">
        <img class="step-image" src="https://jn-img.enclaves.ph/Bagisto/Step%20by%20Step/bouncing_house.gif?updatedAt=1707980528078" alt="" />
    </div>
    <div class="content-side">
        <p class="content-heading">How to own your dream
            <sapn style="color:#FCB115">Home</span>
        </p>
        <ul class="content-steps scrollbar-hide scroll-smooth">
            <li class="content-steps-content">	<span class="content-step-count">1</span>
	<span class="count-text">Explore our catalogue to find your dream home
               <p class="mobile-text" style="display:none;">First and foremost, you need to know the purpose of the property you plan to buy. Will it be a place for your family to stay, a vacation house, for your business, or investment?</p>
              </span>

            </li>
            <li class="content-steps-content">	<span class="content-step-count">2</span>
	<span class="count-text">Allow us to help you with the details of the home package

  <p class="mobile-text" style="display:none;">Estimate a move-in date. Do you need a place that’s ready for occupancy, or can you wait for a couple more years and settle with pre-selling properties instead?</p>
  </span>

            </li>
            <li class="content-steps-content">	<span class="content-step-count">3</span>
	<span class="count-text">Upload your documents and makes reservation!
              <p class="mobile-text" style="display:none;">In the Philippine setting, property developers have a roster of brokers or agent to sell properties on their behalf.</p>
              </span>

            </li>
            <li class="read-more" style="display:none;"> <span class="read-more-text">Read More</span>

            </li>
        </ul>
    </div>
</div>
=================================================================================
