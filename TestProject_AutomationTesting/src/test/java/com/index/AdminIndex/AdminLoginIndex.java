package com.index.AdminIndex;

import com.initialization.BrowserConfiguration;
import org.testng.Assert;
import org.testng.annotations.Test;

public class AdminLoginIndex extends BrowserConfiguration {

    @Test
    public void toVerifyUserRedirectedToAdminPage(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase:: PG_SelectRole_001 :: To verify user is redirected to Admin Page.");

        driver.get("http://localhost/parkingGrid/selectRole.php");

        selectRoleIndexPage.selectOnAdmin();
        selectRoleIndexPage.clickOnNextButton();

        log("Verify user is redirected to Admin Page.");
        if (selectVerification.verifyUserRedirectedToAdminLoginPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }


        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyPageTitle(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        driver.get("http://localhost/parkingGrid/selectRole.php");

        log("TestCase :: PG_ParkingGrid_002 :: To verify user can see the Page Title of Admin Login Page.");

        selectRoleIndexPage.selectOnAdmin();
        selectRoleIndexPage.clickOnNextButton();

        if (adminLoginVerification.verifyPageTitle()){
            log("<b> Test verification status : PASS </b> ");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void toVerifyElementsOFAdminPage(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        driver.get("http://localhost/parkingGrid/selectRole.php");

        log("TestCase :: PG_SelectRole_003 :: To verify user can see the following elements of the Admin Page.");

        log("\n - - Logo\n" +
                "- Header with home, about us and contact us.\n" +
                "- Email\n" +
                "- Password\n" +
                "- Login Button\n" +
                "- Forgot Password\n" +
                "- Footer");

        selectRoleIndexPage.selectOnAdmin();
        selectRoleIndexPage.clickOnNextButton();

        if (selectVerification.verifyUserRedirectedToAdminLoginPage()){
            log("<b> Test verification status : PASS </b> ");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void checkValidations(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        driver.get("http://localhost/parkingGrid/selectRole.php");

        log("TestCase :: PG_SelectRole_004 :: To verify the validations for admin login page.");

        log("To verify the blank field validations for email and password.");

        selectRoleIndexPage.selectOnAdmin();
        selectRoleIndexPage.clickOnNextButton();

        log("Login click without entering email and password.");
        adminLoginIndexPage.clickOnLoginButton();
        if (adminLoginVerification.verifyBlankFieldValidations()){
            log("<b> Test verification status : PASS </b> ");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        driver.navigate().refresh();
        //TC_007 covered
       // pause(1);
        log("To verify user receives validation message when user enters only password, without entering email.");
        adminLoginIndexPage.performLogin("", "Test@123");
        adminLoginIndexPage.clickOnLoginButton();

        if (adminLoginVerification.verifyOnlyPasswordEntered()){
            log("<b> Test verification status : PASS </b> ");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        driver.navigate().refresh();
        log("To verify user receives validation message when user enters only email, without entering password.");
        adminLoginIndexPage.performLogin("tapan@gmail.com", "");
        adminLoginIndexPage.clickOnLoginButton();

        if (adminLoginVerification.verifyOnlyEmailEntered()){
            log("<b> Test verification status : PASS </b> ");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        //TC_008
        driver.navigate().refresh();
        log("To verify email not registered.");
        adminLoginIndexPage.performLogin("notregisteredemail@gmail.com","NotRegistered@123");
        adminLoginIndexPage.clickOnLoginButton();

        if (adminLoginVerification.verifyNotRegisteredEmail()){
            log("<b> Test verification status : PASS </b> ");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        //driver.navigate().refresh();
//        //TC_10
//        log("To verify user receives validation message when user receives valid email and invalid password");
//
//        adminLoginIndexPage.performLogin("tapan@gmail.com","Tapan@121");
//        adminLoginIndexPage.clickOnLoginButton();
//
//        if (adminLoginVerification.verifyInvalidPassword()){
//            log("<b> Test verification status : PASS </b> ");
//        }else {
//            log("<b> Test verification status : FAIL </b>");
//            numOfFailedSteps++;
//        }

      //  driver.navigate().refresh();
//        //TC_11
//        log("To verify user receives validation message when user enters valid password and invalid email.");
//
//        adminLoginIndexPage.performLogin("notapan@gmail.com","Tapan@123");
//        adminLoginIndexPage.clickOnLoginButton();
//
//        if (adminLoginVerification.verifyNotRegisteredEmail()){
//            log("<b> Test verification status : PASS </b> ");
//        }else {
//            log("<b> Test verification status : FAIL </b>");
//            numOfFailedSteps++;
//        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void toVerifyAdminNotAccessByUser(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        //TC_009
        log("TestCase :: PG_SelectRole_009 :: To verify user receives You cannot login when user tries to access admin portal.");

        driver.get("http://localhost/parkingGrid/selectRole.php");

        selectRoleIndexPage.selectOnAdmin();
        selectRoleIndexPage.clickOnNextButton();

        adminLoginIndexPage.performLogin("rutu@gmail.com","Rutu@123");
        adminLoginIndexPage.clickOnLoginButton();

        if (adminLoginVerification.verifyUserCannotAccessAdmin()){
            log("<b> Test verification status : PASS </b> ");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void toVerifyAdminLoginSuccessfully(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_SelectRole_012 :: To verify user is redirected to Admin Dashboard Page successfully when user enters valid email and valid password.");

       performAdminLogin();

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyInvalidLogin(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_SelectRole_010 :: To verify user receives validation message when user enters valid admin email and incorrect password.");

        homeIndexPage.clickOnLoginButton();

        log("To verify user is redirected \"Select Role\" Page.");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        selectRoleIndexPage.selectOnAdmin();
        selectRoleIndexPage.clickOnNextButton();

        pause(2);
        log("Verify user is redirected to Admin Login Page.");
        if (selectVerification.verifyUserRedirectedToAdminLoginPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminLoginIndexPage.performLogin("v@hdfhsdhj.m","Vidhi!123");
        adminLoginIndexPage.clickOnLoginButton();

        pause(1);

        log("Verify user receives validation message of invalid user.");
        if (adminLoginVerification.verifyNotRegisteredEmail()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyUserRedirectedToForgotPasswordPage(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_SelectRole_013 :: To verify user is redirected to Forgot Password page when user clicks on Forgot Password.");

        homeIndexPage.clickOnLoginButton();

        log("To verify user is redirected \"Select Role\" Page.");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        selectRoleIndexPage.selectOnAdmin();
        selectRoleIndexPage.clickOnNextButton();

        pause(2);
        log("Verify user is redirected to Admin Login Page.");
        if (selectVerification.verifyUserRedirectedToAdminLoginPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminLoginIndexPage.clickOnForgotPasswordLink();

        log("Verify user is redirected to Forgot Password Page.");
        if (adminLoginVerification.verifyForgotPasswordPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyAdminCannotAccessLoginPageAfterSignOut(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_SelectRole_014 :: To verify admin cannot access the dashboard after sign out.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnUserDropDown();
        adminDashboardIndexPage.clickOnSignOut();

        log("To verify user logged out successfully.");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        driver.navigate().back();

        pause(4);

        log("Verify user can access dashboard after logout");
        if (adminLoginVerification.verifyDashboardVisible()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

}
