const SUCCESS = 'success';
const OK = 'ok';
const ERROR = 'error';


const PasswordResetEmailContent = React.createClass({ displayName: "PasswordResetEmailContent",
  getInitialState() {
    return { state: OK, email: '' };
  },

  getNextState() {
    // TODO: Remove me once `handleSubmit()` is implemented to send request to web API
    const { state } = this.state;
    switch (state) {
      case OK:
        return SUCCESS;
      case SUCCESS:
        return ERROR;
      case ERROR:
        return OK;}

  },

  handleSubmit() {
    // TODO: Send request to web API
    const { email } = this.state;
    if (email) {
      this.setState({ state: this.getNextState(), errorMsg: 'There was an error. Please try again later.' });
    } else
    {
      this.setState({ state: ERROR, errorMsg: 'Please enter your email address.' });
    }
  },

  handleBlur(value) {
    this.setState({ email: value });
  },

  handleCloseMessage() {
    this.setState({ state: OK });
  },

  render() {
    const { state, email, errorMsg } = this.state;
    const formState = state === SUCCESS ?
    'success' :
    state === ERROR ?
    'error' :
    '';

    return /*#__PURE__*/(
      React.createElement("div", { className: "ui container pd-bottom" }, /*#__PURE__*/
      React.createElement("div", { className: "ui one column centered grid", style: { marginTop: '100px' } }, /*#__PURE__*/
      React.createElement("div", { className: "row" }, /*#__PURE__*/
      React.createElement("div", { className: "six wide column" }, /*#__PURE__*/
      React.createElement("h3", { className: "bd-wizard-header bd_color_dark_blue" }, "Reset password"), /*#__PURE__*/


      React.createElement("div", { style: { paddingBottom: '2rem' } }, /*#__PURE__*/
      React.createElement("p", null, " Please enter your email address to reset your password. ")), /*#__PURE__*/

      React.createElement("form", { className: `ui form ${formState}` }, /*#__PURE__*/
      React.createElement("div", { className: "field" }, /*#__PURE__*/
      React.createElement("input", {
        className: "pd-inputs",
        type: "text",
        placeholder: "Email",
        onBlur: event => this.handleBlur(event.target.value) })), /*#__PURE__*/


      React.createElement("button", { className: "ui button fluid primary bd_bg_dark_blue",
        type: "button",
        onClick: this.handleSubmit,
        style: { marginTop: '2rem' } }, "Send password reset email"), /*#__PURE__*/


      React.createElement("div", { className: "ui success small message", style: { marginTop: '2rem' } }, /*#__PURE__*/
      React.createElement("i", { className: "close icon", onClick: this.handleCloseMessage }), /*#__PURE__*/
      React.createElement("i", { className: "checkmark icon" }), "Password reset email has been sent to ", /*#__PURE__*/
      React.createElement("strong", null, email), "."), /*#__PURE__*/

      React.createElement("div", { className: "ui error small message", style: { marginTop: '2rem' } }, /*#__PURE__*/
      React.createElement("i", { className: "close icon", onClick: this.handleCloseMessage }), /*#__PURE__*/
      React.createElement("i", { className: "remove icon" }),
      errorMsg)))))));








  } });



const PasswordResetEmail = React.createClass({ displayName: "PasswordResetEmail",

  getInitialState() {
    return {};
  },

  render() {
    return /*#__PURE__*/(
      React.createElement("div", { className: "pd-main-content" }, /*#__PURE__*/
      React.createElement(PasswordResetEmailContent, null)));


  } });



ReactDOM.render( /*#__PURE__*/React.createElement(PasswordResetEmail, null), document.querySelector('#PasswordResetEmail'));
