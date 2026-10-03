

 Lab #7

Q1. Your form sends data with POST rather than GET. Explain what would go wrong if it used GET instead. Your answer should say something about what a browser does when a page is refreshed.
-if the form used GET, the data would appear in the URL. When the visitor refreshes the page, the browser resends the same GET request and creates a duplicate record. POST + redirect prevents this.

Q2. When validation fails, your controller does not run the code that saves the record — and you did not write an if statement to stop it. Explain what actually stops it, and where the visitor ends up.
-the $request->validate() throws a ValidationException when a rule fails. Laravel catches it, redirects back to the form, and flashes the errors and old input. The rest of store() never runs.

Q3. Your success message is displayed from the layout, which renders on every page. Explain why it does not appear on every page.
-the success message is flash data. It only exists for the next request. After the layout reads it once, it is removed from the session, so it does not appear on later pages.
