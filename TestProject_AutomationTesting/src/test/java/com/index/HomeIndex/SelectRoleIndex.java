package com.index.HomeIndex;

import com.initialization.BrowserConfiguration;
import org.testng.Assert;
import org.testng.annotations.Test;

public class SelectRoleIndex extends BrowserConfiguration {

    @Test
    public void toVerifyUserRedirectedToSelectRole(){

        pause(1);

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase:: PG_SelectRole_001 :: To verify user is redirected to Select Role Page when user clicks on following elements from Home Page on About us, Contact Us, Register and Login Button. ");

        homeIndexPage.clickOnAboutUsButton();
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        selectRoleIndexPage.goToHomePage();

        homeIndexPage.clickOnContactUsButton();
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        selectRoleIndexPage.goToHomePage();

        homeIndexPage.clickOnLoginButton();
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        selectRoleIndexPage.goToHomePage();

        homeIndexPage.clickOnRegisterButton();
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");


    }

    @Test
    public void toVerifySelectRolePageTitle(){
        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_SelectRole_002 :: To verify the title of Select Role Page is Select Role.");

        homeIndexPage.clickOnLoginButton();

        if(selectVerification.verifySelecRoletPagTitle()==true){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }
        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void toVerifyParkingGridLogo(){

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_SelectRole_003 :: To verify user can see the logo of Parking Grid on the top left corner of the Select Role page.");

        homeIndexPage.clickOnLoginButton();
        if (homeVerification.verifyLogo()){
            System.out.println("<b> Test verification status : PASS </b>");
        }else {
            System.out.println("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }
        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");
    }

    @Test
    public void toVerifyUserRoleForm(){
        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_SelectRole_004 :: To verify user can see Admin,Customer and Next Button on Select Role Page Form.");

        homeIndexPage.clickOnLoginButton();

        if (selectVerification.verifySelectRoleForm()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyHeaderOfSelectRolePage(){

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_SelectRole_005 :: To verify user can see Contact Us,About us and home on Select Role Page's Header.");

        if (homeVerification.verifyHeaderElementsOnHomePage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }


        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyNextButtonValidation(){

        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_SelectRole_006 :: To verify user gets validation message when user clicks on Next Button without selecting the Role.");

        homeIndexPage.clickOnLoginButton();

        log("To verify user redirected to \"Select Role\". ");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        selectRoleIndexPage.clickOnNextButton();

        log("Verify user received validation message to \"Select Role\".");
        if (selectVerification.verifySelectUserRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyUserIsRedirectedCustomerPage(){


        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_SelectRole_008 :: To verify user is redirected to Customer Login Page when user clicks on Customer button.");

        homeIndexPage.clickOnLoginButton();

        log("To verify user redirected to \"Select Role\". ");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        selectRoleIndexPage.selectOnCustomer();
        selectRoleIndexPage.clickOnNextButton();

        if (selectVerification.verifyUserRedirectedToCustomerLoginPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

    @Test
    public void toVerifyUserIsRedirectedToAdminPage(){
        int numOfFailedSteps = 0;
        _logStep = 1;

        log("TestCase :: PG_SelectRole_007 :: To verify user is redirected to Admin Login Page when user clicks on Admin button.");

        homeIndexPage.clickOnLoginButton();

        log("To verify user redirected to \"Select Role\". ");
        if (homeVerification.verifyUserRedirectedToSelectRole()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }

        selectRoleIndexPage.selectOnAdmin();
        selectRoleIndexPage.clickOnNextButton();

        if (selectVerification.verifyUserRedirectedToAdminLoginPage()){
            log("<b> Test verification status : PASS </b>");
        }else {
            log("<b> Test verification status : FAIL </b>");
            numOfFailedSteps++;
        }


        if (numOfFailedSteps > 0) Assert.fail("Test Verification failed, please check test logs.");

    }

}
