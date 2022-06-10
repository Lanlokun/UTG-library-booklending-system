import React, { Component } from "react";
import { withTheme, withStyles } from "@material-ui/core/styles";
import { connect } from "react-redux";
import { bindActionCreators } from "redux";
import { Fab, Grid, Paper, Typography, Divider  } from "@material-ui/core";
import { journalize, PublishedComponent, FormattedMessage, Contributions } from "@openimis/fe-core";
import { savePrograms } from "../actions";
import { SaveAlt, Save } from "@material-ui/icons";
// import { ToastContainer, toast } from 'react-toastify';
// import 'react-toastify/dist/ReactToastify.css';
// import { createPrograms } from "../actions";

const styles = theme => ({
    paper: theme.paper.paper,
    tableTitle: theme.table.title,
    item: theme.paper.item,
    fullHeight: {
        height: "100%"
    },
});

const PROGRAMS_ADD_PROGRAMS_INS_CONTRIBUTION_KEY = "programs.addprogramsins";


class AddProgramsPageIns extends Component {
	
	state = {
		edited: {}
	}
	
    componentDidUpdate(prevPops, prevState, snapshort) {
        if (prevPops.submittingMutation && !this.props.submittingMutation) {
            this.props.journalize(this.props.mutation);
        }
    }
	
	save = e => {
		this.props.savePrograms(this.state.edited, `Added Insuree to ${this.state.edited.scheme.name}`)

        //This line gets the value of the name input
        let output =  `${this.state.edited.scheme.name}`;
        
        //These conditions throws the toast message
        // if (output === "undefined"){
        //     let message = <strong><em><h2>Fail To Create Service Provider</h2></em></strong>;
        //     toast.error(message, {
        //         position: toast.POSITION.TOP_RIGHT,
        //         className: 'toast-notify',
        //         progressClassName: 'notify-progress-bar',
        //         autoClose: 60000
        //     });
        
        // }
        // else{
        //     let message = <strong><em><h2>Created {this.state.edited.name} Successfully...</h2></em></strong>;
        //     toast.success(message, {
        //         position: toast.POSITION.TOP_RIGHT,
        //         className: 'toast-notify',
        //         progressClassName: 'notify-progress-bar',
        //         autoClose: 60000
        //     });
        //  }
	}
	
	updateAttribute = (k, v) => {
        this.setState((state) => ({
            edited: { ...state.edited, [k]: v }
        }),
			// e => console.log ("STATE " + JSON.stringify(this.state))
		)
    }

    render() {
        const {
            intl, classes,
            title = "Programs.title", titleParams = { label: "" },
            readOnly = true, family_uuid,
            actions
        } = this.props;
        const { edited } = this.state;

        return (
            <Grid container>
                <Grid item xs={12}>
                <Contributions {...this.props} updateAttribute={this.updateAttribute} contributionKey={PROGRAMS_ADD_PROGRAMS_INS_CONTRIBUTION_KEY} />
                    <Paper className={classes.paper}>
                        <Grid container className={classes.tableTitle}>
                            <Grid item xs={3} className={classes.tableTitle}>
                                <Typography>
                                    <FormattedMessage module="programs" id={title} values={titleParams} />
                                </Typography>
                            </Grid>
                        </Grid>
                        <Divider />
                        <Grid container className={classes.item}>
                            <Grid item xs={7} className={classes.item}>
                                <PublishedComponent
                                    pubRef="payroll.SchemePicker"
                                    value={edited.name}
                                    onChange={(v) => this.updateAttribute("scheme", v)}
                                    required={true}
                                />
                            </Grid>
                            <Grid item xs={5} className={classes.item}>
                                <PublishedComponent
                                    pubRef="insuree.InsureePicker"
                                    value={edited.insuree}
                                    onChange={(v) => this.updateAttribute("insuree", v)}
                                    required={true}
                                />
                            </Grid>
                        </Grid>
                    </Paper>
                    <div className={classes.fab} variant="contained" style={{display: 'flex', justifyContent: 'right'}}>
					    <Fab color="primary" onClick={this.save}>
						    <Save />
					    </Fab>
                    </div>
                </Grid>
            </Grid>
        );
    }
}


const mapStateToProps = (state, props) => ({
    submittingMutation: state.programs.submittingMutation,
    mutation: state.programs.mutation,
});

const mapDispatchToProps = dispatch => {
	return bindActionCreators({savePrograms, journalize}, dispatch)
};

export default withTheme(withStyles(styles)(connect(mapStateToProps, mapDispatchToProps)(AddProgramsPageIns)));