const db = {
    host: 'localhost',
    user: 'root',
    pass: '',
    database: 'erovoutikalms'
  };
  
  const connection = new mysqli(db.host, db.user, db.pass, db.database);
  
  connection.connect((err) => {
    if (err) {
      console.error('Error connecting to MySQL:', err);
      return;
    }
    console.log('Connected to MySQL');
  });
  
  // Retrieve list of users and display them on the page
  connection.query(`SELECT * FROM usertable`, (err, results) => {
    if (err) {
      console.error('Error retrieving usertable:', err);
      return;
    }
    const usersList = '';
    results.forEach((user) => {
      usersList += `
        <div class="user">
          <span>${user.name}</span>
          <span>${user.email}</span>
        </div>
      `;
    });
    document.getElementById('users-list').innerHTML = usersList;
  });
  
  // Update user function
  document.getElementById('update-user-form').addEventListener('submit', (e) => {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const query = `UPDATE usertable SET email='${email}' WHERE name='${name}'`;
    connection.query(query, (err, results) => {
      if (err) {
        console.error('Error updating user:', err);
        return;
      }
      console.log(`User ${name} updated successfully`);
      // Display success message
      alert('User updated successfully');
    });
  });
  
  // Delete user function
  document.getElementById('delete-user-form').addEventListener('submit', (e) => {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const query = `DELETE FROM usertable WHERE name='${name}'`;
    connection.query(query, (err, results) => {
      if (err) {
        console.error('Error deleting user:', err);
        return;
      }
      console.log(`User ${name} deleted successfully`);
      // Display success message
      alert('User deleted successfully');
    });
  });
  $('#update-user-form, #delete-user-form').on('click', () => {
    connection.query(`SELECT * FROM usertable`, (err, results) => {
      if (err) {
        console.error('Error retrieving usertable:', err);
        return;
      }
      const usersList = '';
      results.forEach((user) => {
        usersList += `
          <div class="user">
            <span>${user.name}</span>
            <span>${user.email}</span>
          </div>
        `;
      });
      document.getElementById('users-list').innerHTML = usersList;
    });
  });