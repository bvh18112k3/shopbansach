<style>
    section{
        display: grid;
        grid-template-columns: 25% 60%;
        grid-gap: 128px;

    }
    .location {
        margin-top: 64px;
        margin-left: 48px;
        border: 3px solid #F7F7F7;
        width: 350px;
        padding: 16px 16px;
    }
    .location img{
        width: 60%;
        margin: 10px 0px 0px 24px;
    }
    .location p{
        font-size: 16px;
        font-weight: bold;
    }
    .location span{
        color: #717171;
    }
    .location button{
        width: 150px;
        height: 35px;
        border-radius: 20px;
        transition: 2s;
        background-color: #E02020;
        border: 1px solid #E02020;
        margin-top: 12px;
    }
    .location i{
        margin-right: 5px;
    }
    .location a{
        color: #FFFFFF;
        text-decoration: none;
        font-weight: bold;
    }
    .location button:hover{
        background-color: black;
        border: 1px solid black;
    }

    .form{
        border: 3px solid #F7F7F7;
        margin-top: 64px;
        padding-left: 32px;
        position: relative;
        margin-bottom: 200px;
    }
    .form h1{
        font-size: 24px;
    }
    .input{
        display: grid;
        grid-template-columns: 1fr 3fr;
    }
    .input label{
        width: 100%;
        margin-top: 32px;
        font-weight: bold;
    }
    .text{
        display: flex;
        justify-content: center;
        gap: 205px;
        margin-top: 16px;
        margin-bottom: 50px;
    }
    .text label{
        font-weight: bold;
    }
    .text textarea{
        width: 700px;
    }
    .button{
        position: absolute;
        right: 100px;
        top: 750px;
    }
    .button button{
        background-color: #E02020;
        width: 120px;
        height: 35px;
        border-radius: 10px;
        border: 1px solid #E02020;
        color: #FFFFFF;
        font-weight: bold;
    }
    .button button:hover{
        background-color: black;
        border: 1px solid  black;
    }
    footer {
        display: flex;
        justify-content: center;
        gap: 168px;
    }

    .contact {
        margin-top: 16px;
        line-height: 32px;
        margin-bottom: 64px;
    }

    .contact p {
        color: #E02020;
        font-size: 18px;
        font-weight: bold;
    }

    .contact span {
        color: #717171;
        margin-left: 10px;
    }

    .contact i {
        color: #717171;
    }

    .infor {
        line-height: 24px;
    }

    .infor li {
        list-style: none;
    }

    .infor a {
        text-decoration: none;
        color: #717171;
        transition: 0.5s;
        font-weight: bold;
    }

    .infor a:hover {
        color: #252525;

    }
</style>
<section>
    <article class="location">
        <p>Gobazar - Best Online Store</p>
        <span>184 Lorem Rd, St Ipsum Road PLC 3021, London</span><br>
        <button><a href="https://goo.gl/maps/LLzp4nSHhCPPmFxMA"><i class="fa-solid fa-location-dot"></i>View Google
                Map</a></button>
        <p>Fax</p>
        <span>0123456789</span>
        <p>Opening Times</p>
        <span>9:00 AM to 7:00 PM</span>
        <p>Comments</p>
        <span>
                Shop Laptop feature only the best laptop deals on the market. By comparing laptop deals from the likes
                of PC World, Comet, Dixons, The Link and Carphone Warehouse
            </span>
    </article>
    <article class="">
        <form action="">
            <div class="form">
                <h1>Contact Form</h1>
                <div class="">
                    <label for="">Your Name</label>
                    <input type="text">
                </div>
                <div class="">
                    <label for="">E-Mail Address</label>
                    <input type="text"><br>
                </div>
                <div class="">
                    <label for="">Enquiry</label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="button">
                    <button type="submit">Submit</button>
                </div>
            </div>

        </form>
    </article>
</section>
<div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7458.13082434047!2d105.8391214!3d20.8290649!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1660173772018!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
