<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const calendarContainer = document.getElementById('calendar');
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();

        function generateCalendar(year, month) {
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);

            const daysInMonth = lastDay.getDate();
            const startingDay = firstDay.getDay();

            const monthNames = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];

            const table = document.createElement('table');
            table.classList.add('table', 'table-form'); // Add the desired classes

            const header = table.createTHead();
            const body = table.createTBody();

            const headerRow = header.insertRow();
            for (let day = 0; day < 7; day++) {
                const th = document.createElement('th');
                th.textContent = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'][day];
                headerRow.appendChild(th);
            }

            let date = 1;
            for (let i = 0; i < 5; i++) {
                const row = body.insertRow();
                for (let j = 0; j < 7; j++) {
                    const cell = row.insertCell();
                    if (i === 0 && j < startingDay) {
                        // Empty cells before the start of the month
                        continue;
                    }
                    if (date > daysInMonth) {
                        // No need to fill cells after the end of the month
                        break;
                    }
                    cell.textContent = date;
                    if (date === currentDate.getDate() && year === currentYear && month === currentMonth) {
                        // Highlight the current date
                        cell.classList.add('current-date');
                    }
                    date++;
                }
            }
            calendarContainer.innerHTML = '';
            calendarContainer.appendChild(table);
        }
        generateCalendar(currentYear, currentMonth);
    });
</script>