document.addEventListener('DOMContentLoaded', () => {

    //targets the user list (table of users) from the adminpage page
    let userList = document.querySelector('.user-list');

    //upon clicking anywhere on that list, the following will occur:
    userList.addEventListener('click', event => {

        // Identifies which row was clicked
        let targetRow = event.target.closest('tr');

        if (targetRow && targetRow.rowIndex > 0) { // Ensure it's not the header row(first row)
            
            const userId = targetRow.cells[0].textContent.trim(); 
            // Retrieves the Userid(First cell: index 0)
            // Trim removes the whitespaces before/after if any. Can cause errors if not taken care of 

            const userType = targetRow.cells[1].textContent.trim(); 
            // User Type from the second cell
            
            const formData = new FormData();
            formData.append('userId', userId);
            formData.append('userType', userType);

            //Executes infoRetrieve.php while passing userid and usertype as $_POST method
            fetch('../AdminPage/infoRetrieve.php', {
                method: 'POST',
                body: formData,
            })

            //checks the response given by the infoRetrieve page
            .then(response => {
                if (response.ok) {
                    // Redirect to infoRetrieve.php if the POST was successful
                    window.location.href = '../AdminPage/infoRetrieve.php';
                } else {
                    throw new Error('Response was not ok.Error Posting data.');
                }
            })
        }
    });
});

