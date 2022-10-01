package com.index.AdminIndex;

import com.initialization.BrowserConfiguration;
import org.testng.Assert;
import org.testng.annotations.Test;

public class AdminDashboardIndex extends BrowserConfiguration {


    @Test
    public void toVerifyAdminDashboardPageRedirection(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_AdminDashboard_002 :: To verify admin is redirected to Admin Dashboard Page successfully after login with valid admin credentials.");

        performAdminLogin();

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void verifyPageTitle(){

        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_AdminDashboard_002 :: To verify the title of the Admin Dashboard Page is Admin Dashboard.");

        performAdminLogin();

        log("Verify the title of the Dashboard Page.");
        if (adminDashboardVerification.verifyDashboardPageTitle()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void verifyDashboardElements(){

        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_AdminDashboard_001 :: To verify admin dashboard elements.");

        performAdminLogin();

        log("\"To verify admin can see the following elements on \"\"Admin Dashboard Page\"\".\n" +
                "- Logo \n" +
                "- Header (with home and user name with dropdown)\n" +
                "- Welcome Header Message\n" +
                "- Manage Users\n" +
                "- Manage Bookings\n" +
                "- Manage Locations\n" +
                "- Footer\"");

        if (adminLoginVerification.verifyAdminLoginSuccessfully()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void toRedirectToManageUsersPage(){

        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_AdminDashboard_004 :: To verify admin is redirected to Manage user's page when admin clicks on Manage Users.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageUsers();

        log("To verify user redirected to Manage user's page.");
        if(adminDashboardVerification.verifyManageUsersPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toRedirectToManageBookings(){

        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_AdminDashboard_005 :: To verify admin is redirected to Manage booking's page when admin clicks on Manage Bookings.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageBookings();

        log("To verify user redirected to Manage Booking's page.");
        if(adminDashboardVerification.verifyManageBookingsPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toRedirectToManageLocations(){

        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_AdminDashboard_006 :: To verify admin is redirected to Manage locations's page when admin clicks on Manage Locations.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageLocations();

        log("To verify user redirected to Manage Location's page.");
        if(adminDashboardVerification.verifyManageLocationPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");


    }

    @Test
    public void toRedirectToEditProfile(){

        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_AdminDashboard_008 :: To verify admin is redirected to edit profile page when admin clicks on Edit Profile.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnUserDropDown();
        adminDashboardIndexPage.clickOnEditProfile();

        log("Verify user is redirected to Edit Profile Page Successfully.");
        if (adminDashboardVerification.verifyEditProfilePage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toLogoutSuccessfully(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_AdminDashboard_009 :: To admin is Logged out successfully when admin clicks on Sign out.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnUserDropDown();
        adminDashboardIndexPage.clickOnSignOut();

        log("Verify user Logged out successfully.");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }


        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }




//    public void performAdminLogin(){
//
//        int numOfFailedSteps = 0;
//        _logStep = 1;
//
//        homeIndexPage.clickOnLoginButton();
//
//        log("To verify user is redirected \"Select Role\" Page.");
//        if (homeVerification.verifyUserRedirectedToSelectRole()){
//            log("<b> Test verification status : PASS </b>");
//        }else {
//            log("<b> Test verification status : FAIL </b>");
//            numOfFailedSteps++;
//        }
//
//        selectRoleIndexPage.selectOnAdmin();
//        selectRoleIndexPage.clickOnNextButton();
//
//        pause(2);
//        log("Verify user is redirected to Admin Login Page.");
//        if (selectVerification.verifyUserRedirectedToAdminLoginPage()){
//            log("<b> Test verification status : PASS </b>");
//        }else {
//            log("<b> Test verification status : FAIL </b>");
//            numOfFailedSteps++;
//        }
//
//        adminLoginIndexPage.performLogin("tapan@gmail.com","Tapan@123");
//        adminLoginIndexPage.clickOnLoginButton();
//
//        pause(1);
//
//        adminLoginIndexPage.acceptAlert();
//
//        log("Verify user is redirected to Admin Dashboard Successfully.");
//        if (adminLoginVerification.verifyAdminLoginSuccessfully()){
//            log("<b> Test verification status : PASS </b>");
//        }else {
//            log("<b> Test verification status : FAIL </b>");
//            numOfFailedSteps++;
//        }
//
//    }
}
