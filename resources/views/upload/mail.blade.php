<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Approved </title>
</head>

<body>
    <span>Dear : <b>{{ $data->contact_surname }} </b> ,</span>
    <span>{{ $data->applicant_code }}</span>

    @if ($data->status == 2)
        <p> You applicantion for e-promta is Approved</p>

        <p> Congratulations</p>
    @elseif ($data->status == 0)
        <p class=" text-danger"> You applicantion for e-promta is not Approved</p>

        <p> please try again</p>
    @endif

</body>

</html>
