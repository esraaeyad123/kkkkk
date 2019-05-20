<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
    <div class="form-wrap">
        <div class="tab">

            <div class="tab-content">
                <div class="tab-content-inner active" data-content="signup">
                    <h3 class="cursive-font">Table Reservation</h3>
                    <form action="#">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="activities">services</label>
                                <select name="#" id="activities" class="form-control">
                                    @foreach($catAll as $cat)
                                    <option value="">{{ $cat ->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="activities">Persons</label>
                                <select name="#" id="activities" class="form-control">

                                    if( $cat ->name= categories_id)
                                    @foreach($employeAll as $em)

                                    <option value="">{{ $em ->firstname }}</option>
                                    @endforeach
                                    endif

                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="date-start">Date</label>
                                <input type="text" id="date" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="date-start">Time</label>
                                <input type="text" id="time" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary btn-block" value="Reserve Now">
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
