<!-- resources/views/emails/employer-document.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Client Inspection Notification Message</title>
</head>
<body>
    <p>Dear Client,</p>

    <p>This is to notify you of a new inspection date from NIWA portal.</p>

    <p>Details of a new client document:</p>
    <ul>
        <li>Inspection date: {{ $inspectionDatetime }}</li>
    </ul>

    <p>Visit the url below to follow up and make payment form inspection</p>

    <p><a href="https://eniwa.com.ng/payment/inspection">Inspection Status</a></p>

    <p>Best regards,</p>
    <p>NIWA EROM Portal</p>
</body>
</html>
