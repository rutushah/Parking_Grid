package com.verification.AdminVerification;

import com.initialization.AbstractPage;
import com.validations.AdminValidations;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;
import org.testng.Assert;

public class AdminLoginVerification extends AbstractPage implements AdminValidations {
    /**
     * To get the PageFactory of the DOM
     *
     * @param driver WebDriver
     */
    public AdminLoginVerification(WebDriver driver) {
        super(driver);
    }

    //-------------------------Variable Declaration Section--------------------------------
    String _pageTitle = "Login";
    String _emailError = "";
    String _passwordError = "";
    String _invalidEmail = "";
    String _invalidPassword = "";

    //-------------------------Locator's Definition Section--------------------------------
    @FindBy(xpath = "//input[@placeholder='Username']")
    private WebElement txtUserName;

    @FindBy(xpath = "//input[@placeholder='Password']")
    private WebElement txtPassword;

    @FindBy(xpath = "//u[normalize-space()='Forgot Password?']")
    private WebElement lblForgotPassword;

    @FindBy(xpath = "//input[@id='login']")
    private WebElement btnLogin;

    @FindBy(xpath = "//p[normalize-space()='Please enter email, email should not be blank.']")
    private WebElement lblEmail;

    @FindBy(xpath = "//p[contains(text(),'Please enter password, password should not be blan')]")
    private WebElement lblPassword;

    @FindBy(xpath = "//div[@class='container-fluid']")
    private WebElement adminHeader;

    @FindBy(xpath = "//button[@onclick='redirectToManageUsers()']")
    private WebElement manageUsers;

    @FindBy(xpath = "//button[normalize-space()='Manage Booking']")
    private WebElement manageBooking;

    @FindBy(xpath = "//button[normalize-space()='Manage Locations']")
    private WebElement manageLocations;

    @FindBy(xpath = "//footer[@class='footer navbar-fixed-bottom text-center text-lg-start bg-info text-light']")
    private WebElement footer;

    @FindBy(xpath = "//input[@id='email']")
    private WebElement txtEmail;

    @FindBy(xpath = "//input[@id='motherName']")
    private WebElement txtMotherName;

    @FindBy(xpath = "//input[@id='petName']")
    private WebElement txtPetName;

    @FindBy(xpath = "//input[@id='birthPlace']")
    private WebElement txtBirthPlace;

    @FindBy(xpath = "//input[@name='recover_password']")
    private WebElement btnRecoverPassword;

    @FindBy(xpath = "//input[@name='login']")
    private WebElement loginBtn;
    //-------------------------Method's Definition Section----------------------------------

    public boolean verifyPageTitle(){
        String _actualHomePageTitle = driver.getTitle();
        Assert.assertEquals(_pageTitle,_actualHomePageTitle);
        return true;
    }

    public boolean verifyBlankFieldValidations(){

        _emailError = lblEmail.getText();
        _passwordError = lblPassword.getText();

        Assert.assertEquals(_emailError,EMAIL_ERROR);
        Assert.assertEquals(_passwordError,PASSWORD_ERROR);
        return true;
    }

    public boolean verifyOnlyPasswordEntered(){
        _emailError = lblEmail.getText();
        Assert.assertTrue(_emailError.equalsIgnoreCase(EMAIL_ERROR));
        return true;
    }

    public boolean verifyOnlyEmailEntered(){
        _passwordError = lblPassword.getText();

        Assert.assertTrue(_passwordError.equalsIgnoreCase(PASSWORD_ERROR));
        return true;
    }

    public boolean verifyNotRegisteredEmail(){
        _invalidEmail = driver.switchTo().alert().getText();

        Assert.assertEquals(_invalidEmail,INVALID_EMAIL);
        return true;
    }

    public boolean verifyInvalidPassword(){

        _invalidPassword = driver.switchTo().alert().getText();

        Assert.assertEquals(_invalidPassword,INVALID_PASSWORD);
        return true;
    }

    public boolean verifyUserCannotAccessAdmin(){
        _invalidPassword = driver.switchTo().alert().getText();

        Assert.assertEquals(_invalidPassword,INVALID_PASSWORD);
        return true;
    }

    public boolean verifyAdminLoginSuccessfully(){

        Assert.assertTrue(adminHeader.isDisplayed() && manageUsers.isDisplayed() &&
                manageBooking.isDisplayed() && manageLocations.isDisplayed() && footer.isDisplayed());

        return true;
    }

    public boolean verifyForgotPasswordPage(){

        Assert.assertTrue(txtEmail.isDisplayed() && txtMotherName.isDisplayed() &&
                txtPetName.isDisplayed() && txtBirthPlace.isDisplayed() &&
                loginBtn.isDisplayed() && btnRecoverPassword.isDisplayed());
        return true;
    }

    public boolean verifyDashboardVisible(){
        Assert.assertTrue(adminHeader.isDisplayed() && manageUsers.isDisplayed() &&
                manageBooking.isDisplayed() && manageLocations.isDisplayed() && footer.isDisplayed());
        return false;
    }

}

