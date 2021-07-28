<html>
<style>
    .container {
        margin: auto;
        width: 50%;
        height: 50%;
        background-image: linear-gradient(150deg, rgba(80, 193, 233, .4) 0%, rgba(122, 87, 209, .8) 62%);
        border-radius: 15px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 2px;
    }

    .header {
        display: flex;
        background-image: linear-gradient(150deg, rgba(80, 193, 233, 1) 0%, rgba(122, 87, 209, 1) 62%);
        color: #fff;
        width: 100%;
        height: 50px;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        margin-bottom: 4px;
    }

    .main {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        width: 100%;
        height: 100%;
        border-radius: 14px;
        margin-top: 4px;
        flex-direction: column;
    }

    .text {
        padding: 10px;
        color: #777;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 20px;
    }

    .code {
        color: blueviolet;
        background-color: #eee4;
        padding: 10px 15px;
        border-radius: 10px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 25px;
    }

</style>
<div class="container">
    <div class="header">
        <h4>Exchange CMS</h4>
    </div>
    <div class="main">
        <span class="text">
            Your Verification Code is:
        </span>
        <hr style="width: 20%; background-color:#eee; height: 1px; border: none;">
        <span class="code">
            {{ $body }}
        </span>
    </div>

</div>

</html>
