package com.indexPage.AdminIndexPage;

import com.initialization.AbstractPage;
import com.verification.AdminVerification.AdminLoginVerification;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.FindBy;

public class AdminLoginIndexPage extends AbstractPage {
    /**
     * To get the PageFactory of the DOM
     *
     * @param driver WebDriver
     */
    public AdminLoginIndexPage(WebDriver driver) {
        super(driver);
    }

    //-------------------------Variable Declaration Section--------------------------------

//     String _username = "vidhi@gmail.com";
//     String _password = "Vidhi!123";

    //-------------------------Locator's Definition Section--------------------------------

    @FindBy(xpath = "//input[@placeholder='Username']")
    private WebElement txtUsername;

    @FindBy(xpath = "//input[@placeholder='Password']")
    private WebElement txtPassword;

    @FindBy(xpath = "//input[@id='login']")
    private WebElement btnLogin;

    @FindBy(xpath = "//u[normalize-space()='Forgot Password?']")
    private WebElement lblForgotPassword;

    //-------------------------Method's Definition Section----------------------------------

    public AdminLoginVerification performLogin(String username, String password){

//        username =  _username;
        txtUsername.sendKeys(username);
        txtPassword.sendKeys(password);

        return new AdminLoginVerification(driver);
    }

    public AdminLoginVerification clickOnLoginButton(){
        log("Step : " +_logStep++ + " Click on Login Button.");
        highlightElement(driver,btnLogin);
        btnLogin.click();
        return new AdminLoginVerification(driver);
    }

    public void acceptAlert(){
        driver.switchTo().alert().accept();
    }

    public AdminLoginVerification clickOnForgotPasswordLink(){
        log("Step : " +_logStep++ + " Click on Forgot Password Link.");
        highlightElement(driver,lblForgotPassword);
        lblForgotPassword.click();
        return new AdminLoginVerification(driver);
    }
}
