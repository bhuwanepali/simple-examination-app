<div class="container" style="background-color:#eee;padding:5px 0 0 10px;">
    <div class="row align-items-center vh-100">
        <div class="col-6 mx-auto">
            <div class="card" style="border:none;outline:1px;">
                <h4 class="text-left pl-2 pt-2" style="padding:0px!important;">Hello Student,</h4>
                <div class="card-body d-flex flex-column align-items-center">
                    <p class="card-text">Please click the button below to take the examination</p>
                    <a href="{{ env('APP_URL') . '/objective_question/' . encrypt($email . '=>' . $id) }}"
                        class="btn btn-success"
                        style="display: inline-block;
                        padding: 5px 10px;
                        font-size: 12px;
                        text-align: center;
                        text-decoration: none;
                        background-color: #3f968e;
                        color: #ffffff;
                        border: none;
                        margin-bottom:10px;
                        border-radius: 4px;
                        cursor: pointer;">Click
                        Here</a>
                </div>
            </div>
        </div>
    </div>
</div>
