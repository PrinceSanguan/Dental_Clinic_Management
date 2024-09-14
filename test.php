<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disable Dates in Datepicker</title>
</head>
<body>

<label for="datepicker">Select a Date:</label>
<input type="date" id="datepicker">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const datePicker = document.getElementById('datepicker');

        // List of dates to disable (in yyyy-mm-dd format)
        const disabledDates = [
            '2024-08-25',
            '2024-08-26',
            '2024-08-27'
        ];

        // Disable specific dates
        datePicker.addEventListener('input', function() {
            const selectedDate = this.value;
            if (disabledDates.includes(selectedDate)) {
                alert('This date is not available. Please select another date.');
                this.value = ''; // Clear the selected date
            }
        });

        // Optionally, you can also set the min and max dates
        datePicker.setAttribute('min', '2024-08-20');
        datePicker.setAttribute('max', '2024-09-10');
    });
</script>

</body>
</html>
