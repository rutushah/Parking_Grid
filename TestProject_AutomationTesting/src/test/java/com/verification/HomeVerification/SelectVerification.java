package com.verification.HomeVerification;

import com.initialization.AbstractPage;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;
import org.testng.Assert;

public class SelectVerification extends AbstractPage {
    /**
     * To get the PageFactory of the DOM
     *
     * @param driver WebDriver
     */
    public SelectVerification(WebDriver driver) {
        super(driver);
    }

    //--------------------------------Variable Declaration Section--------------------------------

    String _pageTitle = "Select Role";
    String _selectRoleError = " Select User Role";

    //-------------------------------Locator's Definition Section-------------------------------------

    @FindBy(xpath = "//label[normalize-space()='Admin']//input")
    private WebElement adminRadio;

    @FindBy(xpath = "//label[normalize-space()='Customer']//input")
    private WebElement adminCustomer;

    @FindBy(xpath = " //input[@id='next']")
    private WebElement btnNext;

    @FindBy(xpath = "//div[@class='avatar bg-info']")
    private WebElement lblLogo;

    @FindBy(xpath = "//input[@placeholder='Username']")
    private WebElement txtUserName;

    @FindBy(xpath = "//input[@placeholder='Password']")
    private WebElement txtPassword;

    @FindBy(xpath = "//u[normalize-space()='Forgot Password?']")
    private WebElement lblForgotPassword;

    @FindBy(xpath = "//input[@id='login']")
    private WebElement btnLogin;

    @FindBy(xpath = "//u[@class='text-info']")
    private WebElement btnSignUp;


    //-------------------------------Method Declaration Section----------------------------------------

    public boolean verifySelecRoletPagTitle(){
        String _actualHomePageTitle = driver.getTitle();
        Assert.assertEquals(_pageTitle,_actualHomePageTitle);
        return true;
    }

    public boolean verifySelectRoleForm(){
        Assert.assertTrue( btnNext.isDisplayed() == true);
        return true;
    }

    public boolean verifySelectUserRole(){
        String actualError = driver.switchTo().alert().getText();
        Assert.assertEquals(_selectRoleError,actualError);
        return true;
    }

    public boolean verifyUserRedirectedToCustomerLoginPage(){

        Assert.assertTrue(lblLogo.isDisplayed() == true &&
                txtUserName.isDisplayed() == true && txtPassword.isDisplayed() == true &&
                lblForgotPassword.isDisplayed() == true && btnLogin.isDisplayed() == true &&
                btnSignUp.isDisplayed() == true);
    return true;
    }

    public boolean verifyUserRedirectedToAdminLoginPage(){
        Assert.assertTrue(lblLogo.isDisplayed() == true &&
                txtUserName.isDisplayed() == true && txtPassword.isDisplayed() == true &&
                lblForgotPassword.isDisplayed() == true && btnLogin.isDisplayed() == true);
        return true;
    }




}
