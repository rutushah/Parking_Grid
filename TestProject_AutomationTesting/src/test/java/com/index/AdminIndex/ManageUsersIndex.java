package com.index.AdminIndex;

import com.initialization.BrowserConfiguration;
import org.testng.Assert;
import org.testng.annotations.Test;

public class ManageUsersIndex extends BrowserConfiguration {

    @Test
    public void verifyPageTitle(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_ManageUsers_001 :: To verify the page title of Manage Users Page.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageUsers();

        log("To verify user can see the Page Title of Manage Users Page.");
        if (adminDashboardVerification.verifyManageUserPageTitle()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");

            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void verifyUsersPage(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_ManageUsers_002 :: To verify admin can see the Manage Users Page.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageUsers();

        log("To verify user can see the Manage Users Page.");
        if (adminDashboardVerification.verifyManageUsersPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void verifyUserBlockUnblockSuccessfully(){
        pause(2);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_ManageUsers_003 :: To verify admin can block and unblock the Users successfully.");

        performAdminLogin();

        adminDashboardIndexPage.clickOnManageUsers();

        log("To verify user can see the Manage Users Page.");
        if (adminDashboardVerification.verifyManageUsersPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminDashboardIndexPage.clickOnBlockButton();
        log("To verify user is blocked successfully.");
        if (adminDashboardVerification.verifyUserBlockedSuccessfully()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminDashboardIndexPage.clickOnUserDropDown();
        adminDashboardIndexPage.clickOnSignOut();

        log("Verify user is redirected to \"Select Role \" Page.");
        selectRoleIndexPage.selectOnCustomer();
        selectRoleIndexPage.clickOnNextButton();

        log("Verify user is redirected to \"Customer Login Page\".");
        if (selectVerification.verifyUserRedirectedToCustomerLoginPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminLoginIndexPage.performLogin("vidhi@gmail.com","Vidhi@123");

        adminLoginIndexPage.clickOnLoginButton();

        log("Verify user receives validation message that \"You cannot login !! Please Contact to the Administrative Department...\".");
        if (adminDashboardVerification.verifyUserCannotLogin()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        //to redirect back to select role and unblock the users.

        adminLoginIndexPage.acceptAlert();
        pause(2);
        homeIndexPage.clickOnAboutUsButton();

        log("Verify user is redirected back to \"Select Role\" Page.");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        selectRoleIndexPage.selectOnAdmin();
        selectRoleIndexPage.clickOnNextButton();

        log("Verify user is redirected back to admin login page.");
        if (selectVerification.verifyUserRedirectedToAdminLoginPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminLoginIndexPage.performLogin("tapan@gmail.com", "Tapan@123");
        adminLoginIndexPage.clickOnLoginButton();

        pause(1);

        adminLoginIndexPage.acceptAlert();

        log("Verify admin Login successfully");
        if (adminLoginVerification.verifyAdminLoginSuccessfully()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminDashboardIndexPage.clickOnManageUsers();

        log("Verify user is redirected to manage users page.");
        if (adminDashboardVerification.verifyManageUsersPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminDashboardIndexPage.clickOnUnblockButton();
        log("Verify user is unblocked successfully");
        if (adminDashboardVerification.verifyUserUnblockedSucccessfully()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminDashboardIndexPage.clickOnUserDropDown();
        adminDashboardIndexPage.clickOnSignOut();

        log("Verify user is redirected to \"Select Role \" Page.");
        selectRoleIndexPage.selectOnCustomer();
        selectRoleIndexPage.clickOnNextButton();

        log("Verify user is redirected to \"Customer Login Page\".");
        if (selectVerification.verifyUserRedirectedToCustomerLoginPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        adminLoginIndexPage.performLogin("vidhi@gmail.com","Vidhi@123");

        adminLoginIndexPage.clickOnLoginButton();

        log("Verify user is able to login to parking grid's customer portal after user is unblocked successfully");
        if (loginVerification.verifyUserLogInSuccessfully()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

}
