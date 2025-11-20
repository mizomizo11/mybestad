

<div class="container" style="margin: 20px;">
    <div class="row">
        <div class="col-md-12">
            <h3  style="text-align: center;color: #0f9bc0;border-bottom:1px solid #0f9bc0;padding:10px;">
                 تحديد المواعيد الجديدة
            </h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
             <form   action="{{url(app()->getLocale()."/appointments/confirm-five-dates")}}"  method="post"  >
                @csrf
                <table class="table ">
                    <thead>
                    <tr class="bgc-info-l3">
                        <th>اسم المريض</th>
                        <th>الموعدالاول</th>
                        <th>الموعد الثاني</th>
                        <th>الموعد الثالث</th>
                        <th>الموعد الرابع</th>
                        <th>الموعد الخامس</th>
                        <th> اعتماد</th>
                    </tr>
                    </thead>
                            <tr>
                                  <input type="hidden" name="appointment_id" value="{{@$consultation->appointment->id}}" class="btn btn-sm btn-light-info " >
                                <td>{{@$consultation->patient->name}}</td>
                                <td><input type="datetime-local" name="appointment1" class="btn btn-sm btn-light-info " required></td>
                                <td><input type="datetime-local" name="appointment2" class="btn btn-sm btn-light-info " required></td>
                                <td><input type="datetime-local" name="appointment3" class="btn btn-sm btn-light-info " required></td>
                                <td><input type="datetime-local" name="appointment4" class="btn btn-sm btn-light-info " ></td>
                                <td><input type="datetime-local" name="appointment5" class="btn btn-sm btn-light-info " ></td>
                                <td>
                                    <input type="submit" value="اعتماد" class="btn btn-light-success btn-h-light-info btn-a-light-primary fs--outline"></td>
                            </tr>
                </table>
            </form>

        </div>
    </div>
</div>
