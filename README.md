# Dynamic Subpage Title Widget for JetEngine Profile Builder Account Page

This WordPress code snippet allows you to dynamically display the title of the Account Page subpage within the JetEngine Profile Builder widget. It utilizes a shortcode that you can insert anywhere on your pages or posts to show the dynamic subpage title.

## What the Code Does

1.  **Gets the Current URL:** Detects the web address of the page the user is currently viewing.
2.  **Extracts the Slug:** Identifies the last part of the URL (the "slug"). For example, in `https://yourwebsite.com/my-subpage`, the slug would be `my-subpage`.
3.  **Retrieves Subpage Data:** Looks for a WordPress option (by default, named `profile-builder`) that contains the information about your subpages.
4.  **Finds the Corresponding Title:** Within the subpage data, it compares the slug extracted from the URL with the slugs you've defined. If it finds a match, it extracts the associated title.
5.  **Returns a Default Title:** If no subpage is found with the URL's slug, it displays the text "Title Not Found".
6.  **Creates a Shortcode:** Registers a function as a WordPress shortcode called `dynamic_subpage_title`. You can use `[dynamic_subpage_title]` in your content to display the dynamic title.

## Requirements and Implementation Steps

1.  **Save Subpage Data in an Option:**
    * You need to have an option in your WordPress database that stores the information about your subpages. By default, the code looks for an option named `profile-builder`. If you want to use a different name, you'll need to modify the code.
2.  **Option Data Structure:**
    * The option should contain a serialized array with a specific structure that includes the slugs and titles of your subpages. Here's an example of what the structure should look like in PHP:

    ```php
    $data = [
        'account_page_structure' => [
            ['slug' => 'my-profile', 'title' => 'My Profile'],
            ['slug' => 'edit-details', 'title' => 'Edit Information'],
            ['slug' => 'previous-orders', 'title' => 'Order History'],
            // ... other subpages
        ]
    ];
    update_option('profile-builder', serialize($data));
    ```

    * **Important:** Make sure this data structure is saved in the WordPress option that the code will search for. You can do this by adding the PHP code above (modifying the slugs and titles according to your needs) to your child theme's `functions.php` file (with caution) or by using a plugin to manage options.
3.  **Add the Code to Your Theme:**
    * Copy and paste the provided PHP function (the one that generates the dynamic title and registers the shortcode) into your child theme's `functions.php` file. **Do not directly edit your main theme's `functions.php` file, as you will lose the changes when the theme is updated!** If you don't have a child theme, consider creating one. You can also use a code snippets plugin.
4.  **Use the Shortcode on Your Pages:**
    * Insert the shortcode `[dynamic_subpage_title]` on any page or post where you want the dynamic subpage title to appear. This is ideal for your Account Page template within JetEngine's Profile Builder.
5.  **Verify the Slug in the URL:**
    * Ensure that the slugs in the URLs of your Account Page subpages exactly match the slugs you defined in the WordPress option's data structure.
6.  **Test the Functionality:**
    * Navigate through the different subpages of your Account Page. The shortcode should display the correct title for each subpage based on its URL. If a matching slug isn't found, it will display "Title Not Found".

## Example Usage

Let's say you have an Account Page subpage with the URL `https://yoursite.com/account/personal-info`.

If in your `profile-builder` option you have a subpage defined with `'slug' => 'personal-info'` and `'title' => 'Personal Details'`, then by inserting the shortcode `[dynamic_subpage_title]` into that page's template, it will display the text "Personal Details".

With these steps, you'll be able to implement a very useful dynamic title system for your Account Page subpages!
